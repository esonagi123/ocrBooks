@extends('base')

@section('content')


<div class="listbody">
    <form class="search-box" id="searchForm" action="" method="get">
        <input class="search-txt fs-6" type="text" name="searchKeyword" id="searchKeyword" placeholder="메모 내용으로 검색">
        <button class="search-btn fs-6" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    <!-- 검색 결과 엘리먼트 -->
    <div class="search-results" id="searchResults"></div>


    <div class="search-form">
        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="" id="btn-check-1" autocomplete="off"> 
            <label class="form-check-label btn btn-primary" for="btn-check-1">쇼핑</label>
        </p>

        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="" id="btn-check-2" autocomplete="off"> 
            <label class="form-check-label btn btn-primary" for="btn-check-2">식비</label>
        </p>

        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="" id="btn-check-3" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-3">교통비</label>
        </p>

        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="" id="btn-check-4" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-4">문화</label>
        </p>

        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="" id="btn-check-5" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-5">주유</label>
        </p>

        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="" id="btn-check-6" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-6">기타</label>
        </p>

        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="" id="btn-check-6" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-6">기타</label>
        </p>
    </div>

   <!-- 캘린더
    <div class="input-container input-container-md">
        <div class="input-group">
            <input type="text" placeholder="yyyy. mm. dd" class="input-box" id="date-rage-picker" style="padding-right: 38px;">
            <div class="input-group-tools">
                <button class="option type">
                    <i class="Licon ico-calender"></i>
                </button>
                <button class="option error">
                    <i class="Licon ico-warning"></i>
                </button>
                <button class="option success">
                    <i class="Licon ico-check"></i>
                </button>
                <button class="clear on">
                    <i class="material-icons">cancel</i>
                </button>
            </div>
        </div>
        <p class="status-message">상태메세지는 이곳에 쓰여집니다.</p>
    </div>
-->
                                    
 



    <div class="listform">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <!-- <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="detail">    
                        <div class="list date">4.15</div>
                        <div class="list shop">멍멍냥냥</div>
                        <div class="list total">3,800</div>
                    </div>
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                        <div>
                            <i class="fa-solid fa-tag"></i>
                            <i class="category fa-solid fa-basket-shopping"></i>
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
                        <p class="shop">참치연어</p>
                        <p class="total">13,000</p>
                    </div>
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <i class="fa-solid fa-tag"></i>
                            <i class="category fa-solid fa-utensils"></i>
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
                        <p class="shop">GS 칼텍스</p>
                        <p class="total">70,000</p>
                    </div>
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <i class="fa-solid fa-tag"></i>
                            <i class="category fa-solid fa-gas-pump"></i>
                        </div>
                        주유
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>


<!-- 리스트 맵핑 -->
<script>
    const data = [
        {
            date: '4.15',
            shop: '멍멍냥냥',
            total: '3,800',
            category: 'fa-basket-shopping',
            memo: '집가는 길에 강쥐 장난감 사들고 귀가!'
        },
        {
            date: '4.12',
            shop: '참치연어',
            total: '13,000',
            category: 'fa-utensils',
            memo: '연어초밥 얌'
        },
        {
            date: '4.12',
            shop: 'GS 칼텍스',
            total: '70,000',
            category: 'fa-gas-pump',
            memo: '주유'
        },
        {
            date: '4.11',
            shop: '교모문구',
            total: '43,000',
            category: 'fa-book',
            memo: '천개의 파랑, 침묵의 봄   책값 너무 올랐어 ㅜ'
        },
        {
            date: '4.11',
            shop: '3월 교통비 출금',
            total: '83,400',
            category: 'fa-bus',
            memo: '3월 교통비'
        }
    ];

const accordionItems = data.map((item, index) => `
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-${index}" aria-expanded="false" aria-controls="flush-collapse-${index}">
                <div class="detail">
                    <div class="list date">${item.date}</div>
                    <div class="list shop">${item.shop}</div>
                    <div class="list total">${item.total}</div>
                </div>
            </button>
        </h2>
        <div id="flush-collapse-${index}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div>
                    <i class="fa-solid fa-tag"></i>
                    <i class="category fa-solid ${item.category}"></i>
                </div>
                <div class="memo">${item.memo}</div>
            </div>
        </div>
    </div>
`).join('');


//메모검색 동작안함....
// const searchForm = document.getElementById('searchForm');
//     const searchResults = document.getElementById('searchResults');

//     searchForm.addEventListener('submit', function(event) {
//         const keyword = document.getElementById('searchKeyword').value.trim().toLowerCase();
//         if (keyword === '') {
//             searchResults.innerHTML = ''; 
//             return;
//         }

//         const filteredItems = data.filter(item => item.memo.toLowerCase().includes(keyword));
//         renderItems(filteredItems);
//     });

//     function renderItems(items) {
//         let html = '';
//         items.forEach(item => {
//             html += `
//                 <div class="accordion-item">
//
//                 </div>
//             `;
//         });
//         searchResults.innerHTML = html; 
//     }

document.getElementById('accordionFlushExample').innerHTML = accordionItems;
</script>


<!-- 
// 카테고리 검색 적용안됨 보류.......
    function handleCheckboxChange() {
        const checkboxes = document.querySelectorAll('.btn-check'); 

        checkboxes.forEach((checkbox, index) => {
            checkbox.addEventListener('change', function() {
                const isChecked = this.checked; 
                const tagName = this.labels[0].innerText; 
                const category = this.labels[0].innerText.toLowerCase().replace(/\s+/g, '-');

                const listItems = document.querySelectorAll('.listform .accordion-item'); 

                listItems.forEach((item, idx) => {
                    const itemCategory = item.querySelector('.category').classList[2]; 

                    
                    if (isChecked && itemCategory === `fa-solid-${category}`) {
                        item.style.display = 'block'; 
                    } else {
                        item.style.display = 'none'; 
                    }
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        renderItems(); 
        handleCheckboxChange(); 
    });
</script> -->

<!-- 캘린더 JS -->
<script>
	$('#date-rage-picker')
        .daterangepicker({
            format : 'YYYY. MM. DD hh:mm A',
            applyButtonClasses : 'btn btn-container btn-secondary btn-sm wth-80',
            cancelClass : 'btn btn-container btn-gray btn-sm wth-80',
            // locale: moment.locale('ko'),
            locale : {
                daysOfWeek : moment
                        .locale('ko').daysOfWeek,
                monthNames : moment
                        .locale('ko').monthNames,
                'applyLabel' : '적용',
                'cancelLabel' : '취소'
            },
    });
</script>
			
				
@endsection()