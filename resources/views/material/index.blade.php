@extends('layouts.base')
@section('title','書籍一覧')
@section('main')
    <h1>書籍一覧</h1>
    <br>
    <div><!-- 書籍の一覧 -->
        <table class="table">
            <tr>
                <th style="width: 100px"></th>
                <th style="width: 600px">書名</th>
                <th style="width: 150px">著者名</th>
            </tr>
            @foreach($materials as $material)
                <tr>
                    <td style="height: 120px">
                        <figure>
                            <img src="{{'https://ndlsearch.ndl.go.jp/thumbnail/' . $material->book->isbn . '.jpg'}}" 
                                alt="書籍イメージ画像" title="{{ 'ISBN: '.$material->isbn }}" style="width: 70px">
                        </figure>            
                    </td>
                    <td>{{ $material->book->title }}</td>
                    <td>{{ $material->book->author }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <a href="/library/index">メニューに戻る</a></li>
@endsection