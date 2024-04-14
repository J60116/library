<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('libraries')->insert([
            'material_id'=>2,
            'user_id'=>1,
            'checkedout_date'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
