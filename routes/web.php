<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Account\Join;
use App\Http\Controllers\ocrAPI;
use App\Http\Controllers\OCR\BooksCtrl;
use App\Http\Controllers\MainCtrl;

Route::get('/login', function () { // 로그인 view
    return view('account.login');
});

Route::post('/login/check', [Login::class, 'check'])->name('login.check'); // 로그인
Route::post('/signup/store', [Join::class, 'store'])->name('signup.store'); // 회원가입

Route::get('/signup', function () { 
    return view('account.signup');
});


Route::middleware(['app'])->group(function () // 사용자 정보를 가져오기 위한 미들웨어
{
    Route::middleware(['LoginCheck'])->group(function () { // 로그인 했을 경우만 접속 가능한 미들웨어
        

        
        Route::get('/scan', function () {
            return view('books.scan');
        });

        Route::get('/edit', function () { 
            return view('account.edit');
        });

<<<<<<< HEAD
        Route::get('/mypage', function () { 
            return view('mypage');
        });

=======

        Route::get('/', [MainCtrl::class, 'index'])->name('main.index');
        Route::get('/uselist', [BooksCtrl::class, 'index'])->name('books.index');
        Route::get('/logout', [Login::class, 'logout']); // 로그아웃
>>>>>>> origin/dev
        Route::post('api/requestOCR', [ocrAPI::class, 'upload'])->name('upload'); // OCR API 호출
        Route::post('save_result', [BooksCtrl::class, 'store'])->name('save_result'); // OCR 결과 저장

        Route::post('/setGoal', [MainCtrl::class, 'setGoal'])->name('setGoal'); // 목표 지출 설정
    });
});



