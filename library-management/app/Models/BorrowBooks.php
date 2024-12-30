<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowBooks extends Model
{
    use HasFactory;

    protected $dates = ['borrow_date', 'return_date'];

    // Define the table name if it's different from the default plural
    protected $table = 'borrow_books';

    // Define the fillable attributes
    protected $fillable = [
        'book_id',
        'member_id',
        'borrow_date',
        'return_date',
    ];

    // Define relationships, if needed
    public function book()
    {
        // return $this->belongsTo(BooksNew::class);
        return $this->belongsTo(BooksNew::class, 'book_id');
    }

    public function member()
    {
        return $this->belongsTo(MemberAcc::class, 'member_id'); // Assuming you have a Member model
    }
}
