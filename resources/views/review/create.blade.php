@extends('layouts.base')
@section('title','レビュー登録')
@section('main')
    <h1>レビューの新規登録</h1>
    <br>
    <form action="/review/store" method="post">
        @csrf
        <div class="mb-3 text-center">
            <p> {{ $record->title }}</p>
            <input type="hidden" name="isbn" value="{{ $record->isbn }}">
        </div>
        <!-- <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">評価</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="rank0" value="0">
                    <label class="form-check-label" for="rank0">
                        0: とても不満
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="rank1" value="1">
                    <label class="form-check-label" for="rank1">
                        1: 不満
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="rank2" value="2">
                    <label class="form-check-label" for="rank2">
                        2: ふつう
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="rank3" value="3" checked>
                    <label class="form-check-label" for="rank3">
                        3: 期待通り
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="4">
                    <label class="form-check-label" for="gridRadios1">
                        4: 満足
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="rank5" value="5">
                    <label class="form-check-label" for="rank5">
                        5: とても満足
                    </label>
                </div>
            </div>
        </fieldset> -->
        <!-- <div class="mb-3 col-md-4">
            <label for="rank" class="form-label">評価</label>
            <select id="rank" class="form-select" name="rank">
                <option value="0">0: とても不満</option>
                <option value="1">1: 不満</option>
                <option value="2">2: ふつう</option>
                <option value="3" selected>3: 期待通り</option>
                <option value="4">4: 満足</option>
                <option value="5">5: とても満足</option>
            </select>
        </div> -->
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select" id="rank" aria-label="Floating label select example" name="rank">
                        <option value="0">0: とても不満</option>
                        <option value="1">1: 不満</option>
                        <option value="2">2: ふつう</option>
                        <option value="3" selected>3: 期待通り</option>
                        <option value="4">4: 満足</option>
                        <option value="5">5: とても満足</option>
                    </select>
                    <label for="rank">評価</label>
                </div>
            </div>
            <div class="col-md form-floating">
                <textarea class="form-control" name="comment" id="comment" style="height: 100px"required>{{old('review')}}</textarea>
                <label for="comment">コメント</label>
            </div>
        </div>
        <!-- <div class="form-floating">
            <textarea class="form-control" name="comment" id="comment" style="height: 80px"required>{{old('review')}}</textarea>
            <label for="comment">コメント</label>
        </div> -->
        <br>
        <div class="text-center">
            <input type="reset" class="btn btn-secondary btn-sm" value="クリア">
            <input type="submit" class="btn btn-primary" value="登録">
        </div>
    </form>
    <br>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach 
    @endif
    <br>
    <form action="/review/index" method="post">
        @csrf
        <input type="hidden" name="isbn" value="{{ $record->isbn }}">
        <input type="submit" class="btn btn-link" value="書籍レビューに戻る">
    </form>
@endsection