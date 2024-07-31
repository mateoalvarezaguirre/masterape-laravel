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
        Schema::table('purchases_books', function (Blueprint $table) {
            $table->foreign('book_id', 'fk_purchases_books_books')->references('id')->on('books')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('purchase_id', 'fk_purchases_books_purchases')->references('id')->on('purchases')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchases_books', function (Blueprint $table) {
            $table->dropForeign('fk_purchases_books_books');
            $table->dropForeign('fk_purchases_books_purchases');
        });
    }
};
