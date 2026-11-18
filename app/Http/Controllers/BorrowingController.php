<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Validation\ValidationException;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'user'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();

        return view('borrowings.create', compact('members', 'books'));
    }

   
public function store(Request $request)
{
    $validated = $request->validate([
        'member_id'   => 'required|exists:members,id',
        'book_id'     => 'required|exists:books,id',
        'quantity'    => 'required|integer|min:1',
        'borrow_date' => 'required|date',
    ]);

    $borrowDate = Carbon::parse($validated['borrow_date']);
    $dueDate = $borrowDate->copy()->addDays(7);

    DB::transaction(function () use ($validated, $borrowDate, $dueDate) {

        // Mengunci data buku selama transaksi berlangsung.
        $book = Book::whereKey($validated['book_id'])
            ->lockForUpdate()
            ->firstOrFail();

        // Memastikan stok mencukupi.
        if ($book->stock < $validated['quantity']) {
            throw ValidationException::withMessages([
                'quantity' => 'Stok buku tidak mencukupi. Sisa stok tersedia: ' . $book->stock,
            ]);
        }

        $borrowing = Borrowing::create([
            'member_id'   => $validated['member_id'],
            'user_id'     => Auth::id(),
            'borrow_date' => $borrowDate->toDateString(),
            'due_date'    => $dueDate->toDateString(),
            'status'      => 'borrowed',
        ]);

        BorrowingDetail::create([
            'borrowing_id' => $borrowing->id,
            'book_id'      => $book->id,
            'quantity'     => $validated['quantity'],
        ]);

        $book->decrement('stock', $validated['quantity']);

    }, 3);

    return redirect()
        ->route('borrowings.index')
        ->with('success', 'Transaksi peminjaman berhasil disimpan dan stok buku telah diperbarui.');
}
public function returnBook($id)
{
    DB::transaction(function () use ($id) {

        // Mengunci transaksi peminjaman agar tidak diproses bersamaan.
        $borrowing = Borrowing::whereKey($id)
            ->lockForUpdate()
            ->firstOrFail();

        // Mencegah transaksi dikembalikan lebih dari satu kali.
        if ($borrowing->status !== 'borrowed') {
            throw ValidationException::withMessages([
                'return' => 'Buku pada transaksi ini sudah dikembalikan.',
            ]);
        }

        // Mengambil semua detail buku dalam transaksi.
        $details = BorrowingDetail::where(
            'borrowing_id',
            $borrowing->id
        )->get();

        foreach ($details as $detail) {

            // Mengunci data buku sebelum stok ditambahkan.
            $book = Book::whereKey($detail->book_id)
                ->lockForUpdate()
                ->firstOrFail();

            // Mengembalikan stok sesuai jumlah yang dipinjam.
            $book->increment('stock', $detail->quantity);
        }

        // Memperbarui status dan tanggal pengembalian.
        $borrowing->update([
            'status' => 'returned',
            'return_date' => Carbon::today()->toDateString(),
        ]);

    }, 3);

    return redirect()
        ->route('borrowings.index')
        ->with('success', 'Buku berhasil dikembalikan dan stok telah diperbarui.');
}
public function show(Borrowing $borrowing)
{
    $borrowing->load([
        'user',
        'member',
        'details.book'
    ]);

    return view('borrowings.show', compact('borrowing'));
}
}

