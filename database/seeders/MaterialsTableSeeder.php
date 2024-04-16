<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('materials')->insert([
            'book_isbn' => 9784295017936,
            'checked' => 0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('materials')->insert([
            'book_isbn' => 9784295017936,
            'checked' => 1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('materials')->insert([
            'book_isbn' => 9784297128524,
            'checked' => 0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('materials')->insert([
            'book_isbn' => 9784800712349,
            'checked' => 0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('materials')->insert([
            'book_isbn' => 9784534059079,
            'checked' => 0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        // 追加
        DB::table('materials')->insert([
            'book_isbn' => 9784798172439,
            'checked' => 1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
