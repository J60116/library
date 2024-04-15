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
        return view('/review/index',$data);
    }
    // 登録
    public function create(Request $req) 
    {
        $isbn = $req->isbn;
        $user_id = $req->session()->get('user_id');
        // 対応する書籍レコードを取得
        $record = Book::find($isbn);
        // レコードが見つかった場合のみビューに渡す
        if ($record) {
            $data = [
                'record' => $record
            ];
            return view('review.create', $data);
        } else {
            // レコードが見つからない場合はリダイレクトなど適切な処理を行う
            return redirect('/');
        }
    }
    // 登録完了
    public function store(Request $req)
    {
        // フォームから取得
        $isbn = $req->isbn;
        // セッションから取得
        $user_id = $req->session()->get('user_id');
        $user_name = $req->session()->get('user_name');
        
        // マイレビューを探す
        $myReview = Review::where('book_isbn',$isbn)->where('user_id',$user_id)->first();

        // Reviewテーブルの編集前に、マイレビューの有無を確認しておく
        if(!empty($myReview->id)){
            // マイレビューがあれば書籍一覧にリダイレクト
            session()->flash('flash_message', $user_name.'さんのレビューは既に登録されています（書籍一覧画面へ移行）');
            return redirect('/material/index');
        } else {
            // マイレビューが無いことを確認してから、新規作成
            $review = new Review();
        
            // 各列にデータを代入
            $review->comment = $req->comment;
            $review->rank = $req->rank;
            $review->book_isbn = $isbn; //フォームから取得
            $review->user_id = $user_id; //セッションから取得

            //tableにデータを保存するメソッドの実行
            $review->save();

            //登録したデータをビューに渡し、表示する
            $data=[
                'book' => Book::find($isbn),
                'comment' => $req->comment,
                'rank' => $req->rank,
                'isbn' => $isbn
            ];
            return view('review.store',$data);
        }
    }

}
