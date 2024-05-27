<?php

namespace App\Http\Controllers\OCR;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Books;

class BooksCtrl extends Controller
{
    public function store(Request $request)
    {
        foreach ($request->number as $key => $number) {
        $receipt = new Books;
            // 폼 데이터 설정
            $receipt->uid = $request->input("uid");
            $receipt->shop = $request->input("shop{$number}");
            $receipt->date = $request->input("date{$number}");
            $receipt->total = $request->input("total{$number}");
            $receipt->category = $request->input("category{$number}");
            $receipt->memo = $request->input("memo{$number}");
            
            // 영수증 저장
            $receipt->save();
        }

        // 저장 후 리다이렉트
        return redirect('/')->with('success', '영수증이 성공적으로 저장되었습니다.');
    }
}