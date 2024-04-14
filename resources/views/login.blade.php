@extends('layouts.base')
@section('title','ログイン')
@section('main')
    <h1>図書管理システム</h1>
    <br>
    <div><!-- ログインフォーム -->
        <form class="was-validated" action="/library/index" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control is-valid" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" required>パスワード</label>
                <input type="password" class="form-control is-valid" name="password" id="password" value="{{ old('password') }}" minlength="8">
            </div>
            <input type="submit" value="ログイン" class="btn btn-dark">
        </form>
    </div>
    <br>
    <div><!-- ログイン失敗時の処理 -->
        @if(isset($error))
            <p style="color:red">{{ $error }}</p>
        @endif
    </div>
@endsection