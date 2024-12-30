<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (!Schema::hasTable('borrow_books')) {
            Schema::create('borrow_books', function (Blueprint $table) {
                $table->id(); // Auto-incrementing primary key
                $table->unsignedBigInteger('book_id');
                $table->unsignedBigInteger('member_id');
                $table->timestamp('borrow_date')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('return_date')->nullable();
                $table->timestamps();
    
                // Foreign keys
                $table->foreign('book_id')->references('id')->on('books_new')->onDelete('cascade');
                $table->foreign('member_id')->references('id')->on('member_acc')->onDelete('cascade');
            });
        }

        // Schema::create('borrow_books', function (Blueprint $table) {
        //     $table->id(); // Auto-incrementing primary key
        //     $table->unsignedBigInteger('book_id');
        //     $table->unsignedBigInteger('member_id');
        //     $table->timestamp('borrow_date')->default(DB::raw('CURRENT_TIMESTAMP')); // Set default to current timestamp
        //     $table->timestamp('return_date')->nullable(); // Null by default
        //     $table->timestamps(); // Created at & updated at

        //     // Foreign keys
        //     $table->foreign('book_id')->references('id')->on('books_new')->onDelete('cascade');
        //     $table->foreign('member_id')->references('id')->on('member_acc')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_books');
    }
};
