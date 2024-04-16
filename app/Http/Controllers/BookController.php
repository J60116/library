<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; //追加

class BookController extends Controller
{
    // 所蔵書籍の一覧を表示する
    public function index(Request $req)
    {
        $data = [
            // 重複した書籍は1冊として表示
            'books' => Book::all()
        ];
        return view('book.index',$data);
    }
}
