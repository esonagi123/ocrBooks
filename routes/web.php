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


Route::post('api/requestOCR', [ocrAPI::class, 'index'])->name('ocr');






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

//header
Route::get('/header', function () {
    return view('header');
});

//footer
Route::get('/footer', function () {
    return view('footer');
});

Route::get('/login', function () {
    return view('account.login');
});

Route::get('/base', function () {
    return view('base');