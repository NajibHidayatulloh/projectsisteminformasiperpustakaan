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

        $book = Book::findOrFail($validated['book_id']);

        if ($book->stock < $validated['quantity']) {
            return back()
                ->withErrors([
                    'quantity' => 'Stok buku tidak mencukupi. Sisa stok tersedia: ' . $book->stock,
                ])
                ->withInput();
        }

        $borrowDate = Carbon::parse($validated['borrow_date']);
        $dueDate = $borrowDate->copy()->addDays(7);

        DB::transaction(function () use ($validated, $book, $borrowDate, $dueDate) {
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
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Transaksi peminjaman berhasil disimpan.');
    }
}