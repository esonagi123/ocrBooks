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

// OCR API
Route::post('api/requestOCR', [ocrAPI::class, 'upload'])->name('upload');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar', function () {
    return view('fc.calendar');
});

Route::get('/dashboard', function () {
    return view('fc.dashboard');
});

Route::get('/sign_in', function () {
    return view('m_sign.sign_in');
});

Route::get('/sign_up', function () {
    return view('m_sign.sign_up');
});

// 로그인
Route::get('/m_login', function () {
    return view('m_account.login');
});
Route::get('login', [Login::class, 'index'])->name('login');

// 회원가입
Route::get('/m_join', function () {
    return view('m_account.join');
});
Route::get('register', [Join::class, 'index'])->name('register');
Route::post('register/join', [Join::class, 'store'])->name('register.join');















// PC
Route::post('api/requestOCR', [ocrAPI::class, 'upload'])->name('upload');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('account.login');
});

Route::get('/mypage', function () {
    return view('mypage');
});

Route::get('/main', function () {
    return view('main');
});