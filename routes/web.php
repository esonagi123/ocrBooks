<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ocrAPI;
use App\Http\Controllers\Account\Join;
use App\Http\Controllers\Account\Login;


Route::get('/newBase', function () {
    return view('newBase');
});


// 모바일

// 메인 화면
Route::get('/m_main', function () {
    return view('m_main.index');
});

// 영수증 업로드
Route::get('/m_scan', function () {
    return view('m_books.scan');
});


//header
Route::get('/header', function () {
    return view('header');
});

//footer
Route::get('/footer', function () {
    return view('footer');
});


Route::get('/main', function () {
    return view('main');
});