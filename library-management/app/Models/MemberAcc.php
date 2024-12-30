<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberAcc extends Model
{
    use HasFactory;

    // Specify the table name if it is not 'member_acc'
    protected $table = 'member_acc';

    protected $fillable = [
        'name', 'email', 'password', 'role', // Add 'role' here
    ];

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowBooks::class, 'member_id');
    }
}
