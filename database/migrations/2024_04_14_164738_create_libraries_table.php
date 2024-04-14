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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id'); //貸出した資料ID
            $table->unsignedBigInteger('user_id');//貸出したユーザーID
            $table->date('checkedout_date');//貸出日
            $table->date('return_date')->nullable(true);//返却日
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
        Schema::dropIfExists('lending_libraries');
    }
};
