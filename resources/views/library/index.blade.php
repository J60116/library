@extends('layouts.base')
@section('title','メニュー')
@section('main')
    @if (session('flash_login'))
        <!-- ログイン成功 -->
        <div class="flash_message bg-success text-center py-3 my-0 colorWhite">
            {{ session('flash_login') }}
        </div>
    @endif
    <h1>図書管理システム</h1>
    <br>
    <p>ようこそ、{{session('user_name')}}さん</p>
    <ul>
        <li>
            <a href="/material/index">materialsテーブルの一覧表示</a>
        </li>
        <li>
            <a href="/material/create">書籍の新規追加</a>
        </li>
        <li>
            <a href="https://github.com/J60116/library">GitHubリポジトリ「library」</a>
        </li>
    </ul>
    <hr>
    <form action="/" method="post">
        @csrf
        <input type="submit" value="ログアウト" class="btn btn-dark">
    </form>
@endsection