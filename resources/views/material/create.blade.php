@extends('layouts.base')
@section('title','書籍の新規登録')
@section('main')
    <h1>書籍の新規登録</h1>
    <form action="/material/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="number" class="form-control" name="isbn" id="isbn" value="{{old('isbn')}}" required> 
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">書名</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">著者名</label>
            <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}" required>
        </div>         
        <input type="submit" value="登録" class="btn btn-primary">
    </form>
    <br>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach 
        </ul>
    @endif
@endsection