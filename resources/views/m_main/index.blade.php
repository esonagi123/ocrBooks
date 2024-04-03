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
            <div class="shadow-lg card mainBtn d-flex justify-content-center">
                <i class="fa-solid fa-pen" style="font-size: 40px; color: #ff6b89;"></i>
                <div class="mt-2 fw-semibold">직접 작성</div>
            </div>
        </div>
        <div class="col text-center align-items-center">
            <div class="shadow-lg card mainBtn d-flex justify-content-center">
                <i class="fa-solid fa-receipt" style="font-size: 40px; color: #ffb223;"></i>
                <div class="mt-2 fw-semibold">영수증 스캔</div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col text-center">
            <div class="shadow-lg card mainBtn d-flex justify-content-center">
                <i class="fa-solid fa-book-open" style="font-size: 40px; color: #3485e2;"></i>
                <div class="mt-2 fw-semibold">...</div>
            </div>
        </div>
        <div class="col text-center align-items-center">
            <div class="shadow-lg card mainBtn d-flex justify-content-center">
                <i class="fa-solid fa-sliders" style="font-size: 40px; color: #a723ff;"></i>
                <div class="mt-2 fw-semibold">...</div>
            </div>
        </div>
    </div>
</div>

<div class="mt-2">
    <div class="fw-bold fs-4">
        최근 내역
    </div>
    <div class="mt-3">
        <div class="shadow-lg p-3 mainList">
            <div class="ms-2 fw-medium">
                내역 1
            </div>
        </div>
    </div>
</div>
@endsection()