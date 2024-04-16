@extends('layouts.base')
@section('title','書籍の新規登録')
@section('main')
    <h1>以下のデータを登録しました</h1>
    <table class="table">
        <tr><th>ISBN</th><th>書名</th><th>著者名</th></tr>
        <tr>
            <td>{{ $isbn }}</td>
            <td>{{ $title }}</td>
            <td>{{ $author }}</td>
        </tr>
    </table>
    <br>
    <a href="/book/index">所有書籍を確認する</a>
@endsection