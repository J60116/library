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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_isbn'); //ISBN
            $table->boolean('checked'); //貸出中かどうか
            $table->timestamps();

            //外部キー設定
            $table->foreign('book_isbn')->references('isbn')->on('books');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_materials');
    }
};
