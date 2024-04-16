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
        DB::table('books')->insert([
            'isbn' => 9784297128524,
            'title' => '図解でやさしくわかる ネットワークのしくみ超入門',
            'author' => '網野衛二',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('books')->insert([
            'isbn' => 9784800712349,
            'title' => 'いちばんやさしいSQL入門教室',
            'author' => '矢沢久雄',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('books')->insert([
            'isbn' => 9784534059079,
            'title' => 'この1冊ですべてわかる 新版 SEの基本',
            'author' => '山田隆太',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        // 追加
        DB::table('books')->insert([
            'isbn' => 9784295018452,
            'title' => 'スッキリわかるJava入門 実践編(第4版)',
            'author' => '中山清喬',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('books')->insert([
            'isbn' => 9784798172439,
            'title' => 'アルゴリズム図鑑',
            'author' => '石田保輝　他',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
