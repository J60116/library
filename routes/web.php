<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

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