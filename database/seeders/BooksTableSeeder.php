<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('books')->insert([
            'isbn' => 9784295017936,
            'title' => 'スッキリわかるJava入門(第4版)',
            'author' => '中山清喬',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
