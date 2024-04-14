<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'material_id'=>2,
            'user_id'=>1,
            'comment'=>'スッキリ',
            'rank'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
