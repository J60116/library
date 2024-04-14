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
    <form action="/" method="post">
        @csrf
        <input type="submit" value="ログアウト" class="btn btn-dark">
    </form>
@endsection