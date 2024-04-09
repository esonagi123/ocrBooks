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
});