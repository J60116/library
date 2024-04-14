<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // 追加

class TopController extends Controller
{
    // ログイン機能
    public function login(Request $req)
    {
        if($req->isMethod('get')){

            return view('login');

        } elseif($req->isMethod('post')){
            //formからデータ受け取り
            $email = $req->email;
            $password = $req->password;
            //データベースからemailに対応したユーザー情報を取得
            $user = User::where('email',$email)->first();

            //ログイン可否
            if(isset($user->id) && $email == $user->email && $password == $user->password){
                //セッション追加
                $req->session()->put([
                    'user_id' => $user->id,
                    'user_name' => $user->name
                ]);
                session()->flash('flash_login', 'ログイン認証に成功しました　ようこそ、"'.$user->name.'"さん');
                return view('library/index');
            } else {
                $data = [
                    'email' => $email,
                    'error' => 'ログイン認証に失敗しました'
                ];
                return view('login',$data);
            }
        } else {
            redirect('/');
        }
    }
    // ログイン済みであるか確認
    public function loginCheck(Request $req)
    {
        if(session('user_id')!=""){
            // 既にログインしている場合、ログインページを飛ばしてメニュー選択画面に移動
            // セッションからIDを取得
            $user_id = $req->session()->get('user_id');
            $data = [
                'user' => User::find($user_id)
            ];
            return view('library.index',$data);
        } else {
            // ログインしていない場合はログインページに移動
            return view('login');
        }
    }
    // ログアウト機能
    public function logout(Request $req)
    {
        // 指定したデータを削除
        $req->session()->forget('user_id');
        $req->session()->forget('user_name');
        return view('index');
    }
}
