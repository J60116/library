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
            $table->string('comment'); //コメント
            $table->Integer('rank'); //おすすめ度(0~5)
            $table->unsignedBigInteger('material_id'); //レビューした資料ID
            $table->unsignedBigInteger('user_id'); //レビューしたユーザID
            $table->timestamps();

            //外部キー設定
            $table->foreign('material_id')->references('id')->on('materials');
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
