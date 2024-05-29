@extends('base')
@section('content')
<style>
    .transaction {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        margin: auto;
    }
    .date, .balance {
        font-size: 0.9rem;
    }
    .info {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .logo {
        width: 30px;
        height: 30px;
        background-color: #f6c05d;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        font-weight: bold;
    }
    .text {
        flex-grow: 1;
        font-size: 1rem;
    }
    .time {
        font-size: 0.9rem;
    }
    .amount {
        font-size: 1.25rem;
        color: #ff424d;
        text-align: right;
    }
</style>

<div class="container mt-3">

    <div class="row">
        <div class="col">
            <div class="">
            <div class="shadow-lg p-3 mainBtn mainBanner">
                <div class="ms-2 mt-3 fw-medium">
                    이번 달 지출
                </div>
                <div class="ms-2 fw-bold fs-2">
                    {{ $month_total }} 원
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="shadow-lg p-3 mainBtn mainBanner">
                <div class="ms-2 mt-3 fw-medium">
                    저번 달 지출
                </div>
                <div class="ms-2 fw-bold fs-2">
                    {{ $month_total }} 원
                </div>
            </div>
        </div>
    </div>  
    <div class="row mt-4">
        <div class="col text-center">
            <a class="no-deco" href="#">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-pen" style="font-size: 40px; color: #ff6b89;"></i>
                    <div class="mt-2 fw-semibold textGrey">직접 작성</div>
                </div>
            </a>
        </div>
        <div class="col text-center align-items-center">
            <a class="no-deco" href="{{ url('/scan') }}">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-receipt" style="font-size: 40px; color: #ffb223;"></i>
                    <div class="mt-2 fw-semibold">영수증 스캔</div>
                </div>
            </a>
        </div>
    </div>


    <!-- 최근 내역 -->
    <div class="mt-5" style="margin-bottom: 100px;">
        <div class="fw-bold fs-4">
            최근 내역
        </div>
        @foreach($recents as $recent)
        <div class="mt-3 shadow-lg transaction">
            <div class="info">
                <div class="logo">e</div>
                <div class="text">{{ $recent->shop }}</div>
                <div class="time">5월 28일</div>
            </div>
            <div class="amount">-14,000원</div>
        </div>
        @endforeach
    </div>
</div>
@endsection()