<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('member_acc')) {
            Schema::create('member_acc', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamps();
            });
        }
        // Schema::create('member_acc', function (Blueprint $table) {
        //     $table->id();  // Auto-incrementing primary key
        //     $table->string('name');  // Member's name
        //     $table->string('email')->unique();  // Member's email, must be unique
        //     $table->timestamps();  // Created and updated timestamps
        // });
    }

    public function down(): void
    {
        Schema::dropIfExists('member_acc');
    }
};
