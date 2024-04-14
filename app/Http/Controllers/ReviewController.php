<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material; // 追加
use App\Models\Review; // 追加
use App\Models\User; // 追加


class ReviewController extends Controller
{
    // レビューの一覧を表示する
    public function index(Request $req)
    {
        // フォームから書籍IDを取得
        $material_id = $req->material_id;
        // セッションからログイン中の社員IDを取得
        $user_id = $req->session()->get('user_id');
        // 選択した書籍のmaterial_idが一致するレビューを取得
        $data = [
            'otherReviews' => Review::where('material_id',$material_id)->where('user_id',"!=",$user_id)->get(), // 自分以外のレビューを取得
            'reviews_paginate' => Review::where('material_id',$material_id)->paginate(5),
            'avg_rank' => Review::where('material_id',$material_id)->avg('rank'),
            'material' => Material::find($material_id),
            'myReview' => Review::where('material_id',$material_id)->where('user_id',$user_id)->first(),
            'count_reviews' => Review::where('material_id',$material_id)->count('id'),
            'count_otherReviews' => Review::where('material_id',$material_id)->where('user_id',"!=",$user_id)->count('id'),
            'users' => User::all(),
        ];
        return view('/bookreview/index',$data);
    }

}
