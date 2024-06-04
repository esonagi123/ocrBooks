

<?php $__env->startSection('content'); ?>

<div class="listbody">
    <div>
        <form class="search-box" id="searchForm" action="" method="get">
            <input class="search-txt fs-6" type="text" name="searchKeyword" id="searchKeyword" placeholder="메모 내용으로 검색">
            <button class="search-btn fs-6" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>

    <div class="search-form">
        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="fa-basket-shopping" id="btn-check-1" autocomplete="off"> 
            <label class="form-check-label btn btn-primary" for="btn-check-1">쇼핑</label>
        </p>
        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="fa-utensils" id="btn-check-2" autocomplete="off"> 
            <label class="form-check-label btn btn-primary" for="btn-check-2">식비</label>
        </p>
        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="fa-bus" id="btn-check-3" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-3">교통비</label>
        </p>
        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="fa-book" id="btn-check-4" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-4">문화</label>
        </p>
        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="fa-gas-pump" id="btn-check-5" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-5">주유</label>
        </p>
        <p class="form-check flexCheckDefault">
            <input class="form-check-input btn-check" type="checkbox" value="fa-ellipsis" id="btn-check-6" autocomplete="off">
            <label class="form-check-label btn btn-primary" for="btn-check-6">기타</label>
        </p>
    </div>

    <div class="listform">
        <div class="accordion accordion-flush" id="accordionFlushExample"></div>
    </div>
</div>

<!-- 리스트 맵핑 -->
<script>
    const data = [
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $dateTime = new \DateTime($data->date);
            $month = (int) $dateTime->format('m');
            $day = (int) $dateTime->format('d');
            $date = $month . '월 ' . $day . '일';
        ?>
        {
        
            date: '<?php echo e($date); ?>',
            shop: '<?php echo e($data->shop); ?>',
            total: '<?php echo e($data->total); ?>',
            category: '<?php echo e($data->category); ?>',
            memo: '<?php echo e($data->memo); ?>'
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];

    const accordionItems = data.map((item, index) => `
        <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-${index}" aria-expanded="false" aria-controls="flush-collapse-${index}">
                <div class="detail">
                    <div class="list date">${item.date}</div>
                    <div class="list shop">${item.shop}</div>
                    <div class="list total">${item.total}</div>
                </div>
            </button>
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

    document.getElementById('accordionFlushExample').innerHTML = accordionItems;

    const searchForm = document.getElementById('searchForm');

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const keyword = document.getElementById('searchKeyword').value.trim().toLowerCase();
        
        if (keyword === '') {
            return;
        }
        
        const filteredItems = data.filter(item => item.memo.toLowerCase().includes(keyword));
        
        if (filteredItems.length > 0) {
            const firstMatchIndex = data.findIndex(item => item.memo.toLowerCase().includes(keyword));
            const collapseElement = document.getElementById(`flush-collapse-${firstMatchIndex}`);
            const buttonElement = collapseElement.previousElementSibling.querySelector('.accordion-button');

            document.querySelectorAll('.accordion-collapse').forEach(collapse => {
                if (collapse !== collapseElement) {
                    collapse.classList.remove('show');
                }
            });

            collapseElement.classList.add('show');
            buttonElement.setAttribute('aria-expanded', 'true');
            collapseElement.parentElement.scrollIntoView({ behavior: 'smooth' });

            collapseElement.classList.add('highlight');
            setTimeout(() => {
                collapseElement.classList.remove('highlight');
            }, 2000); 
        }
    });

    function handleCheckboxChange() {
        const checkboxes = document.querySelectorAll('.btn-check');
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                const checkedCheckboxes = Array.from(checkboxes).filter(cb => cb.checked);
                const checkedCategories = checkedCheckboxes.map(cb => cb.value);

                const listItems = document.querySelectorAll('.accordion-item');

                listItems.forEach((item) => {
                    const itemCategory = item.querySelector('.category').classList[2];
                    
                    if (checkedCategories.length === 0 || checkedCategories.includes(itemCategory)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        handleCheckboxChange();
    });
</script>   

<!-- 검색 하이라이트 -->
<style>
    .highlight {
        animation: highlight-animation 2s forwards;
    }

    @keyframes  highlight-animation {
        0% {
            background-color: #007bff; 
        }
        100% {
            background-color: transparent;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\ocrBooks\resources\views/books/uselist.blade.php ENDPATH**/ ?>