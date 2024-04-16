<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/login',function () {
    return view('login');
});

Route::get('/login',[TopController::class,'loginCheck']);
Route::get('/library/index',[TopController::class,'loginCheck']);
Route::post('/library/index',[TopController::class,'login']);
Route::post('/',[TopController::class,'logout']);

Route::get('/book/index',[BookController::class,'index']);
Route::get('/material/create',function () {
    return view('material/create');
});
Route::post('/material/store',[MaterialController::class,'store']);

Route::post('/review/index',[ReviewController::class,'index']);
Route::post('/review/create',[ReviewController::class,'create']);
Route::post('/review/store',[ReviewController::class,'store']);