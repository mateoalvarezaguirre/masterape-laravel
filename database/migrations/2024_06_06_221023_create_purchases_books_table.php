<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->index('fk_purchases_books_books');
            $table->unsignedBigInteger('purchase_id')->index('fk_purchases_books_purchases');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases_books');
    }
};
