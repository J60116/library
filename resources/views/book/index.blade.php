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
    <h1>books index</h1>
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
                @foreach($books as $record)
                <tr>
                    <td style="height: 120px">
                        <figure>
                            <img src="{{'https://ndlsearch.ndl.go.jp/thumbnail/' . $record->isbn . '.jpg'}}" 
                            alt="書籍イメージ画像" title="{{ 'ISBN: '.$record->isbn }}" style="width: 70px">
                        </figure>            
                    </td>
                    <td>
                        <form action="/review/index" method="post">
                            @csrf
                            <input type="hidden" name="isbn" value="{{ $record->isbn }}">
                            <input type="submit" class="btn btn-link" value="{{ $record->title }}">
                        </form>
                    </td>
                    <td>{{ $record->author }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>
    <a href="/library/index">メニューに戻る</a></li>
@endsection