<?php

namespace App\Http\Controllers;

use App\Models\BorrowBooks;
use App\Models\BooksNew;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function borrow($id)
    {
        // Find the book by ID
        $book = BooksNew::findOrFail($id);

        // Check if the book is available for borrowing
        if ($book->availability != 'Available') {
            return redirect()->route('borrow.books')->with('error', 'Book is not available.');
        }

        // Create a new borrowing record
        $borrowing = new BorrowBooks();
        $borrowing->book_id = $book->id;
        $borrowing->member_id = 1; // You can replace this with a fixed member ID or another mechanism
        $borrowing->borrow_date = now();
        $borrowing->return_date = now()->addDays(7); // Set return date as 7 days from now
        $borrowing->save();

        // Optionally, update the book's availability to 'Borrowed'
        $book->availability = 'Borrowed';
        $book->save();

        // Redirect to home with success message
        return redirect()->route('borrow.books')->with('success', 'Book borrowed successfully!');
    }

    public function showBorrowedBooks()
    {
        // Get all borrowed books (you may need to adjust this if you want to filter by member)
        $borrowedBooks = BorrowBooks::with('book') // Assuming you have a relationship set up for the book
                                    ->get();

        // Explicitly cast to Carbon (just in case)
        foreach ($borrowedBooks as $borrowing) {
            $borrowing->borrow_date = \Carbon\Carbon::parse($borrowing->borrow_date);
            $borrowing->return_date = \Carbon\Carbon::parse($borrowing->return_date);
        }

        // Pass the borrowed books to the view
        return view('borrowed-books', compact('borrowedBooks'));
    }
}
