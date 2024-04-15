@extends('layouts.base')
@section('title','書籍一覧')
@section('main')
    @if (session('flash_message'))
        <!-- データベース処理失敗 -->
        <div class="flash_message bg-danger text-center py-3 my-0 colorWhite">
            {{ session('flash_message') }}
        </div>
        <br>
    @endif
    <h1>materials index</h1>
    <br>
    <div><!-- 書籍の一覧 -->
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 100px"></th>
                    <th style="width: 500px">書名</th>
                    <th style="width: 150px">著者名</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                <tr>
                    <td style="height: 120px">
                        <figure>
                            <img src="{{'https://ndlsearch.ndl.go.jp/thumbnail/' . $material->book_isbn . '.jpg'}}" 
                            alt="書籍イメージ画像" title="{{ 'ISBN: '.$material->book_isbn }}" style="width: 70px">
                        </figure>            
                    </td>
                    <td>
                        <form action="/review/index" method="post">
                            @csrf
                            <input type="hidden" name="isbn" value="{{ $material->book_isbn }}">
                            <input type="submit" class="btn btn-link" value="{{ $material->book->title }}">
                        </form>
                    </td>
                    <td>{{ $material->book->author }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/library/index">メニューに戻る</a></li>
@endsection