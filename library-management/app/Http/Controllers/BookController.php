<?php

namespace App\Http\Controllers;

use App\Models\BooksNew;  // Import the new model
use App\Models\BorrowBooks;
use App\Models\MemberAcc;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Fetch all books from the 'books_new' table
        $books = BooksNew::all();  // This now uses the new model 'BooksNew'

        // Return the home view with the books data
        return view('home', compact('books'));  // Passes the $books to the 'home' view
    }

    public function borrow($id)
    {
        // Find the book by ID
        $book = BooksNew::findOrFail($id);

        // Create a new borrowing record (no need for member_id now)
        BorrowBooks::create([
            'book_id' => $book->id,
            'borrow_date' => now(), // Set the borrow date to current time
            'return_date' => null,  // Return date will be null initially
        ]);

        // Update the book availability to 'Borrowed'
        $book->update(['availability' => 'Borrowed']);

        // Redirect back to the home page with a success message
        return redirect()->route('home')->with('success', 'Book borrowed successfully!');
    }

    public function create()
    {
        // Return the view for the 'add-book' page
        return view('addbook');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'availability' => 'nullable|string|max:255',
        ]);

        // Default availability if not provided
        if (!isset($validated['availability'])) {
            $validated['availability'] = 'Available';
        }

        // Create a new book entry
        BooksNew::create($validated);

        // Redirect back to the home page with a success message
        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    public function deleteForm()
    {
        // Fetch all books from the database
        $books = BooksNew::all();

        // Return the view with the list of books
        return view('delete', compact('books'));
    }

    public function deleteBook(Request $request)
    {
        // Validate that a book ID is selected
        $request->validate([
            'book_id' => 'required|exists:books_new,id', // Ensure the book exists
        ]);

        // Find and delete the selected book
        $book = BooksNew::findOrFail($request->book_id);
        $book->delete();

        // Redirect back with a success message
        return redirect()->route('books.deleteForm')->with('success', 'Book deleted successfully!');
    }
}
