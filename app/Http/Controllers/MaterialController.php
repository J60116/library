<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material; // 追加

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

}
