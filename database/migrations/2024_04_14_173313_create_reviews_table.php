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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_isbn'); //レビューした資料ISBN
            $table->unsignedBigInteger('user_id'); //レビューしたユーザID
            $table->string('comment'); //コメント
            $table->Integer('rank'); //おすすめ度(0~5)
            $table->timestamps();

            //外部キー設定
            $table->foreign('book_isbn')->references('isbn')->on('books');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
