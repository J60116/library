@extends('layouts.base')
@section('title','レビューの一覧')
@section('main')
    <h1>レビュー({{ $count_reviews }}件)</h1>
    <br>
    <div><!-- 書籍情報 -->
        <h4>{{ $material->title }}</h4>
        <hr>
        <img src="{{'https://ndlsearch.ndl.go.jp/thumbnail/' . $material->book->isbn . '.jpg'}}" alt="書籍イメージ画像" width="150" align="left" hspace="20px">
        <table> 
            <tr><th style="width:100px">ISBN</th><th style="width:20px">:</th><td>{{ $material->book->isbn }}</td></tr>
            <tr><th>所蔵日</th><th>:</th><td>{{ $material->created_at }}</td></tr>
            <tr><th>更新日</th><th>:</th><td>{{ $material->updated_at }}</td></tr>
            <tr>
                <th>総合評価</th>
                <th>:</th>
                <td>
                @if(isset($avg_rank))
                    @for($i=1;$i<=5;$i++)
                        @if($i<=$avg_rank)
                            <span style="color:orange">★</span>
                        @else
                            <span style="color:gray">★</span>
                        @endif
                    @endfor
                    ({{ number_format($avg_rank,2) }})
                @else
                    なし
                @endif
                </td>
            </tr>
        </table>
        <br><br><br><br><br><br>
    </div>
    <div><!-- マイレビュー -->
        <h5>自分のレビュー</h5>
        <hr>
        @if(!isset($myReview->comment))
            <form action="/bookreview/create">
                @csrf
                登録なし
                <input type="hidden" name="emp_id" value="session('emp_id')">
                <input type="hidden" name="isbn" value="{{ $material->book->isbn }}">
                <input type="submit" value="新規登録">
            </form>
        @else
            <table class="table">
                <tr>
                    <th>コメント</th>
                    <th>評価</th>
                    <th>投稿日時</th>
                    <th></th>
                </tr>
                <tr>
                    <td style="width:300px">{{ $myReview->comment }}</td>
                    <td style="width:150px">
                    @for($i=1;$i<=5;$i++)
                        @if($i<=$myReview->rank)
                            <span style="color:orange">★</span>
                        @else
                            <span style="color:gray">★</span>
                        @endif
                    @endfor
                    </td>
                    <td style="width:200px">{{ $myReview->updated_at }}</td>
                </tr>
            </table>
        @endif
        <br><br>
    </div>
    <div><!-- レビューの一覧 -->
        <h5>その他レビュー ({{ $count_otherReviews }}件)</h5>
        <hr>
        @if($count_otherReviews!=0)
            <table class="table">
                <tr>
                    <th>コメント</th>
                    <th>評価(0~5)</th>
                    <th>投稿日時</th>
                    <th>投稿者</th>
                </tr>
                @foreach($otherReviews as $review)
                    <tr>
                        <td style="width:300px">{{ $review->comment }}</td>
                        <td style="width:150px">{{ $review->rank }}</td>
                        <td style="width:200px">{{ $review->updated_at }}</td>
                        <td>
                            @foreach($employees as $employee)
                                @if($review->emp_id == $employee->emp_id)
                                    {{ $employee->name }}
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
        <!-- {{ $reviews_paginate->links() }} -->
        <br>
    </div>
    <a href="/library/index">書籍一覧に戻る</a>
@endsection