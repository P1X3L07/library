<?php

namespace App\Models;

// use App\Models\BookDB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// $books =BooksNew::all();


class BooksNew extends Model
{
    use HasFactory;

    // If your table is named 'books', specify it here
    protected $table = 'books_new';

    // Add fillable fields if you need mass assignment
    protected $fillable = ['title', 'author', 'genre', 'availability'];

    public function borrowings()
    {
        return $this->hasMany(BorrowBooks::class, 'book_id');
    }

}
