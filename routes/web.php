<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ocrAPI;


// 모바일

Route::get('/m_main', function () {
    return view('m_main.index');
});

Route::get('/m_scan', function () {
    return view('m_books.scan');
});
// PC


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
    return view('fc.sign_in');
});

Route::get('/sign_up', function () {
    return view('fc.sign_up');
});

Route::get('/login', function () {
    return view('account.login');
});