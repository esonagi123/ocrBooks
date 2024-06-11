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

    public function index()
    {
        $user = Auth::user();
        $datas = Books::where('uid', '=', $user->uid)->get();
        return view('books.uselist', ['datas' => $datas]);
    }

    // 검토 후 저장
    public function store(Request $request)
    {
        foreach ($request->number as $key => $number) {
        $receipt = new Books;
            // 폼 데이터 설정
            $receipt->uid = $request->input("uid");
            $receipt->shop = $request->input("shop{$number}");
            $receipt->date = $request->input("date{$number}");

            // 콤마 제거 후 정수형으로 변환
            $total = str_replace(',', '', $request->input("total{$number}"));
            $receipt->total = intval($total);
            
            $receipt->category = $request->input("category{$number}");
            $receipt->memo = $request->input("memo{$number}");
            
            // 영수증 저장
            $receipt->save();
        }

        // 저장 후 리다이렉트
        return redirect('/')->with('success', '영수증이 성공적으로 저장되었습니다.');
    }

    // 직접 입력 저장
    public function store2(Request $request)
    {
        $request->validate([
            'shop' => 'required',
            'date' => 'required|date',
            'total' => 'required|integer',
            'category' => 'required',
        ], [
            'shop.required' => '상호명을 입력하세요.',
            'date.required' => '날짜를 입력하세요.',
            'date.date' => '유효한 날짜 형식을 입력하세요.',
            'total.required' => '총액을 입력하세요.',
            'total.integer' => '총액은 정수로 입력해야 합니다.',
            'category.required' => '카테고리를 입력하세요.',
        ]);
        

        $receipt = new Books;
            // 폼 데이터 설정
            $receipt->uid = $request->input("uid");
            $receipt->shop = $request->input("shop");
            $receipt->date = $request->input("date");

            // 콤마 제거 후 정수형으로 변환
            $total = str_replace(',', '', $request->input("total"));
            $receipt->total = intval($total);
            
            $receipt->category = $request->input("category");
            $receipt->memo = $request->input("memo");
            
            // 영수증 저장
            $receipt->save();

        // 저장 후 리다이렉트
        return redirect('/')->with('success', '영수증이 성공적으로 저장되었습니다.');
    }    
}