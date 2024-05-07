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

Route::get('/receipt', function () {
    return view('receipt.receipt');
});