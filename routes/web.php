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