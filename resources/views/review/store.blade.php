@extends('layouts.base')
@section('title','登録完了')
@section('main')
    <h1>以下のレビューを登録しました</h1>
    <br>
    <h5>{{ $book->title }}</h5>
    <table class="table">
        <tr><th>評価(0~5)</th><th>コメント</th></tr>
        <tr>
            <td>{{ $rank }}</td>
            <td>{{ $comment }}</td>
        </tr>
    </table>
    <br>
    <form action="/review/index" method="post">
        @csrf
        <input type="hidden" name="isbn" value="{{ $isbn }}">
        <input type="submit" class="btn btn-link" value="書籍レビューに戻る">
    </form>
@endsection