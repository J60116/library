<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material; // 追加
use App\Models\Book; //追加

class MaterialController extends Controller
{
    // 所蔵書籍の一覧を表示する
    public function index(Request $req)
    {
        $data = [
            // 重複した書籍は1冊として表示
            'materials' => Material::distinct()->select('book_isbn')->get()
        ];
        return view('material/index',$data);
    }
    // 書籍の登録
    public function store(Request $req)
    {
        //バリデーション機能を追加
        $input = $req->validate([
            'isbn'=> 'required | string | size:13',
            'title' => 'required | string',
            'author' => 'required | string'
        ]);
        
        //入力した値を取り出す
        $isbn = $req->isbn;
        $title = $req->title;
        $author = $req->author;

        //Bookテーブルからisbnが一致するデータを探す
        $book = Book::where('isbn', $isbn)->first();

        if (!$book) {
            // データがない場合は先に書籍情報を登録
            $book = new Book();

            //フォームのデータをプロパティに代入
            $book->isbn = $isbn;
            $book->title = $title;
            $book->author = $author;
            //tableにデータを保存するメソッドの実行
            $book->save();
        }
        // 図書資料の登録
        $material = new Material();
        $material->book_isbn = $isbn;
        $material->checked = 0;
        $material->save();

        //登録したデータをビューに渡し、表示する
        $data=[
            'isbn' => $isbn,
            'title' => $title,
            'author' => $author
        ];
        return view('material.store',$data);
    }
}
