<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);

Route::resource('books', BookController::class);

Route::get('/members', [MemberController::class, 'index'])
    ->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])
    ->name('members.create');
Route::post('/members', [MemberController::class, 'store'])
    ->name('members.store');