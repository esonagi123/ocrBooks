<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/m_main', function () {
    return view('m_main.index');
});

Route::get('/m_scan', function () {
    return view('m_books.scan');
});


Route::get('/base', function () {
    return view('base');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/zoo/handwriting', function () {
    return view('zoo/handwriting');
});


Route::get('/m_base', function () {
    return view('m_base');
});

