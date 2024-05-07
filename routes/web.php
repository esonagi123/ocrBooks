<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ocrAPI;



Route::get('/', function () {
    return view('main.index');
});

Route::get('/scan', function () {
    return view('books.scan');
});

Route::post('api/requestOCR', [ocrAPI::class, 'upload'])->name('upload');