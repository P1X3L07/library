<?php

namespace App\Http\Controllers;

use App\Models\BorrowBooks;
use App\Models\BooksNew;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function borrow($id)
    {
        // Find the book by ID
        $book = BooksNew::findOrFail($id);

        // Check if the book is available for borrowing
        if (!$book || $book->availability === 'Borrowed') {
            return redirect()->back()->with('error', 'Book is not available for borrowing.');
        }

        // Create a new borrowing record
        $borrowing = new BorrowBooks();
        $borrowing->book_id = $id;
        $borrowing->member_id = 1; // You can replace this with a fixed member ID or another mechanism
        $borrowing->borrow_date = now();
        $borrowing->return_date = null; // Set return date as 7 days from now
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
        // Manually cast borrow_date and return_date to Carbon if needed
        $borrowing->borrow_date = \Carbon\Carbon::parse($borrowing->borrow_date);
        if ($borrowing->return_date) {
            $borrowing->return_date = \Carbon\Carbon::parse($borrowing->return_date);
        }
    }
        // foreach ($borrowedBooks as $borrowing) {
        //     $borrowing->borrow_date = \Carbon\Carbon::parse($borrowing->borrow_date);
        //     $borrowing->return_date = \Carbon\Carbon::parse($borrowing->return_date);
        // }

        // Pass the borrowed books to the view
        return view('borrowed-books', compact('borrowedBooks'));
    }

    public function returnBook($bookId)
    {
        // Find the borrowing record by book ID
        $borrowing = BorrowBooks::where('book_id', $bookId)
                                ->whereNull('return_date') // Make sure it's not already returned
                                ->first();

        if ($borrowing) {
            // Set the return date to the current date
            $borrowing->return_date = now();
            $borrowing->save();

            // Find the book and update its availability
            $book = BooksNew::find($bookId);
            if ($book) {
                $book->availability = 'Available'; // Set the book's status to available
                $book->save();
            }

            return redirect()->route('borrow.books')->with('success', 'Book returned successfully!');
        }

        return redirect()->route('borrow.books')->with('error', 'Book not found or already returned.');
    }
}
