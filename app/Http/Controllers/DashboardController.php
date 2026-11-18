<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookTitles = Book::count();
        $totalBookStock = Book::sum('stock');
        $totalMembers = Member::count();
        $activeBorrowings = Borrowing::where('status', 'borrowed')->count();

        return view('dashboard', compact(
            'totalBookTitles',
            'totalBookStock',
            'totalMembers',
            'activeBorrowings'
        ));
    }
}