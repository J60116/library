<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // 追加
use App\Models\Review; // 追加
use App\Models\User; // 追加
use App\Models\Material; // 追加


class ReviewController extends Controller
{
    // レビューの一覧を表示する
    public function index(Request $req)
    {
        // フォームからISBNを取得
        $isbn = $req->isbn;
        // セッションからログイン中の社員IDを取得
        $user_id = $req->session()->get('user_id');
        // 選択した書籍のISBNが一致するレビューを取得
        $data = [
            'otherReviews' => Review::where('book_isbn',$isbn)->where('user_id',"!=",$user_id)->get(), // 自分以外のレビューを取得
            'reviews_paginate' => Review::where('book_isbn',$isbn)->paginate(5),
            'avg_rank' => Review::where('book_isbn',$isbn)->avg('rank'),
            'book' => Book::find($isbn),
            'myReview' => Review::where('book_isbn',$isbn)->where('user_id',$user_id)->first(),
            'count_reviews' => Review::where('book_isbn',$isbn)->count('id'),
            'count_otherReviews' => Review::where('book_isbn',$isbn)->where('user_id',"!=",$user_id)->count('id'),
            'users' => User::all(),
            'count_stock' => Material::where('book_isbn',$isbn)->count('id'),
            'count_checked' => Material::where('book_isbn',$isbn)->where('checked',1)->count('id')
        ];
        return view('/bookreview/index',$data);
    }

}
