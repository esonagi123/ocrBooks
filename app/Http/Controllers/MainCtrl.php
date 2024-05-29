<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Books;
use Symfony\Component\Console\Input\Input;

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

        $monthTotalFormat = number_format($monthTotal, 0, '.', ',');


        // 이번 달 최근 10개 내역 구하기
        $recents = Books::where('uid', $user->uid)
        ->whereBetween('date', [$currentMonthStart, $currentMonthEnd])
        ->orderBy('date', 'desc') // 내림차순
        ->limit(10)
        ->get();

        // 목표 지출 퍼센트 구하기
        if ($user->goal >= 1) {
            $goal1 = $user->goal - $monthTotal;
            $goal2 = $goal1 / $user->goal * 100;
            $percent = 100 - $goal2;
            $percent = 100 - $percent;
        }

        return view('main.index',[
            'month_total' => $monthTotalFormat, 
            'recents' => $recents,
            'percent' => $percent,
        ]);
    }

    public function setGoal(Request $request)
    {
        $user = Auth::user();
        $userModel = User::find($user->id);

        $request->validate([
            'goal' => 'required|integer',
        ], [
            'goal.required' => '지출 목표를 입력해 주세요.',
            'goal.integer' => '숫자만 입력 가능합니다.',
        ]);
                  
        $userModel->goal = $request->input('goal');
        $userModel->save();

        return redirect('/');
    }
}