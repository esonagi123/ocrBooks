@extends('m_base')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="">
            <div class="shadow-lg p-3 mainBtn mainBanner">
                <div class="ms-2 mt-3 fw-medium">
                    이번 달 지출
                </div>
                <div class="ms-2 fw-bold fs-2">
                    100,000원
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col text-center">
            <a class="no-deco" href="#">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-pen" style="font-size: 40px; color: #ff6b89;"></i>
                    <div class="mt-2 fw-semibold textGrey">직접 작성</div>
                </div>
            </a>
        </div>
        <div class="col text-center align-items-center">
            <a class="no-deco" href="#">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-receipt" style="font-size: 40px; color: #ffb223;"></i>
                    <div class="mt-2 fw-semibold">영수증 스캔</div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col text-center">
            <a class="no-deco" href="#">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-book-open" style="font-size: 40px; color: #3485e2;"></i>
                    <div class="mt-2 fw-semibold">...</div>
                </div>
            </a>
        </div>
        <div class="col text-center align-items-center">
            <a class="no-deco" href="#">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-sliders" style="font-size: 40px; color: #a723ff;"></i>
                    <div class="mt-2 fw-semibold">...</div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- 최근 내역 -->
<div class="mt-2">
    <div class="fw-bold fs-4">
        최근 내역
    </div>
    <div class="row mt-3 mainList shadow-lg align-items-center">
        <div class="col-3 d-flex justify-content-center">
            <div class="">
                <div class="ms-2 fw-medium">
                <i class="fa-solid fa-basket-shopping" style="font-size: 25px; color: #fd8535;"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="">
                <div class="ms-2 fw-medium">
                    내역 1
                </div>
            </div>
        </div>        
    </div>
    <div class="row mt-3 mainList shadow-lg align-items-center">
        <div class="col-3 d-flex justify-content-center">
            <div class="">
                <div class="ms-2 fw-medium">
                <i class="fa-solid fa-gas-pump" style="font-size: 25px; color: #74C0FC;"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="">
                <div class="ms-2 fw-medium">
                    내역 2
                </div>
            </div>
        </div>        
    </div>
    <div class="row mt-3 mainList shadow-lg align-items-center">
        <div class="col-3 d-flex justify-content-center">
            <div class="">
                <div class="ms-2 fw-medium">
                <i class="fa-solid fa-utensils" style="font-size: 25px; color: #fe2062;"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="">
                <div class="ms-2 fw-medium">
                    내역 3
                </div>
            </div>
        </div>        
    </div>    
</div>

@endsection()