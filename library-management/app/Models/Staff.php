<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the model name
    protected $table = 'member_acc';

    // Define fillable attributes for mass assignment
    protected $fillable = ['name', 'email', 'role'];
}
