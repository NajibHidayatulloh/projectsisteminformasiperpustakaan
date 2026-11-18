<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
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
}

