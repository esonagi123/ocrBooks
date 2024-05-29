<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Books;

class MainCtrl extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 이번 달 지출 구하기
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        $monthTotal = Books::where('uid', $user->uid)
        ->whereBetween('date', [$currentMonthStart, $currentMonthEnd])
        ->sum('total');

        $monthTotal = number_format($monthTotal, 0, '.', ',');


        // 최근 5개 내역 구하기
        $recents = Books::where('uid', $user->uid)
                    ->orderBy('date', 'desc')
                    ->limit(5)
                    ->get();

        return view('main.index', ['month_total' => $monthTotal, 'recents' => $recents]);
    }
}