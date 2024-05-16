@extends('base')

@section('content')


<div class="listbody">
    <div class="searchform">
        <p class="form-check">
            <input class="form-check-input btn-check" type="checkbox" value="" id="flexCheckDefault btn-check-1" checked autocomplete="off"> 
            <label class="form-check-label btn btn-primary" for="flexCheckDefault btn-check-1">쇼핑</label>
        </p>

        <p class="form-check">
            <input class="form-check-input btn-check" type="checkbox" value="" id="flexCheckDefault btn-check-2" checked autocomplete="off"> 
            <label class="form-check-label btn btn-primary" for="flexCheckDefault btn-check-2">식비</label>
        </p>

        <p class="form-check">
            <input class="form-check-input btn-check" type="checkbox" value="" id="flexCheckDefault btn-check-3" checked autocomplete="off">
            <label class="form-check-label btn btn-primary" for="flexCheckDefault btn-check-3">교통비</label>
        </p>

        <p class="form-check">
            <input class="form-check-input btn-check" type="checkbox" value="" id="flexCheckDefault btn-check-4" checked autocomplete="off">
            <label class="form-check-label btn btn-primary" for="flexCheckDefault btn-check-4">문화</label>
        </p>

        <p class="form-check">
            <input class="form-check-input btn-check" type="checkbox" value="" id="flexCheckDefault btn-check-5" checked autocomplete="off">
            <label class="form-check-label btn btn-primary" for="flexCheckDefault btn-check-5">주유</label>
        </p>

        <p class="form-check">
            <input class="form-check-input btn-check" type="checkbox" value="" id="flexCheckDefault btn-check-6" checked autocomplete="off">
            <label class="form-check-label btn btn-primary" for="flexCheckDefault btn-check-6">기타</label>
        </p>
    </div>

    <form class="search-box" action="" method="get">
        <input class="search-txt" type="text" name="" placeholder="메모내용으로 검색">
        <button class="search-btn" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>




    <div class="search-cal">

    </div>




    <!-- 맵함수로 수정 -->
    <div class="listform">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="detail">    
                        <div class="list date">4.15</div>
                        <div class="list store">멍멍냥냥</div>
                        <div class="list price">3,800</div>
                    </div>
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                        <div>
                            <i class="fa-solid fa-tag"></i>
                            <i class="tag fa-solid fa-basket-shopping"></i>
                        </div>
                        집가는 길에 강쥐 장난감 사들고 귀가!
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <div class="detail">
                        <p class="date">4.12</p>
                        <p class="store">참치연어</p>
                        <p class="price">13,000</p>
                    </div>
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <i class="fa-solid fa-tag"></i>
                            <i class="tag fa-solid fa-utensils"></i>
                        </div>    
                        연어초밥 얌
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <div class="detail">
                        <p class="date">4.12</p>
                        <p class="store">GS 칼텍스</p>
                        <p class="price">70,000</p>
                    </div>
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <i class="fa-solid fa-tag"></i>
                            <i class="tag fa-solid fa-gas-pump"></i>
                        </div>
                        주유
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection()