<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;

// Public Routes for Books (accessible by anyone)
Route::get('/home', [BookController::class, 'index'])->name('home');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

// Public Routes for Borrowing and Returning Books (accessible by anyone)
Route::post('/borrow/{id}', [BorrowController::class, 'borrow'])->name('borrow.book');
Route::post('/return/{id}', [BorrowController::class, 'returnBook'])->name('return.book');
Route::post('/return-book/{bookId}', [BorrowController::class, 'returnBook'])->name('return.book');

// Public Route for Viewing Borrowed Books (accessible by anyone)
Route::get('/borrowed-books', [BorrowController::class, 'showBorrowedBooks'])->name('borrow.books');

// Routes for Book Management (Add, Edit, Delete Books - Open to all)
Route::get('/addbook', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::get('/delete', [BookController::class, 'deleteForm'])->name('books.deleteForm');
Route::post('/delete', [BookController::class, 'deleteBook'])->name('books.delete');

// Routes for Assigning Roles (Optional, Public Access)
Route::post('/assign-role/{userId}/{roleName}', [UserController::class, 'assignRole'])->name('assign.role');

// Routes for Dashboard (accessible by anyone)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
