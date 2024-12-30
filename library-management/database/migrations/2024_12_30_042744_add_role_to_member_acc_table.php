<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('member_acc', function (Blueprint $table) {
            $table->enum('role', ['member', 'staff'])->default('member'); // Add role field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_acc', function (Blueprint $table) {
            $table->dropColumn('role'); // Remove role field
        });
    }
};
