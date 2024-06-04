
<?php $__env->startSection('content'); ?>
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
        width: 35px;
        height: 35px;
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
            <div class="shadow-lg p-3 mainInfoDiv mainBanner">
                <div class="ms-2 mt-2 fw-medium">
                    이번 달 지출
                </div>
                <div class="ms-2 fw-bold fs-2">
                    <?php echo e($monthTotalFormat); ?> 원
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <div class="shadow-lg p-3 mainGoalDiv">
                <div class="d-flex justify-content-between">
                    <div class="ms-2 mb-1 fw-medium">
                        지출 한도
                    </div>
                    <div class="me-2" style="font-size: 13px; color:#7a7a7a;">
                        <?php if($userData['goal'] == 0): ?>
                            
                        <?php else: ?>
                            <?php echo e(number_format($userData['goal'], 0, '.', ',')); ?>원
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($userData['goal'] == 0): ?>
                    <p class="text-center" style="color:#7a7a7a; font-size:13px; margin: 0">지출 목표 금액이 설정되지 않았습니다.</p>
                <?php else: ?>
                <div class="progress">
                    <?php if($percent >= 100): ?>
                    <div class="progress-bar" role="progressbar" style="width: <?php echo e($percent); ?>%; background: #7a8cff;" aria-valuenow="<?php echo e($percent); ?>" aria-valuemin="0" aria-valuemax="100">100%</div>
                    <?php elseif($percent >= 60): ?>
                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($percent); ?>%; background: #7a8cff;" aria-valuenow="<?php echo e($percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    <?php elseif($percent > 15): ?>
                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($percent); ?>%; background: #f6e45d;" aria-valuenow="<?php echo e($percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    <?php elseif($percent >= 1): ?>
                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($percent); ?>%; background: red;" aria-valuenow="<?php echo e($percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    <?php elseif($percent <= 0): ?>
                        <div class="progress-bar" role="progressbar" style="width: 1%; background: red;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="d-flex justify-content-between">
                    <div class="mt-2 ms-2" style="font-size: 13px; color:#7a7a7a;">
                        <?php if($userData['goal'] == 0): ?>
                        <?php elseif($userData['goal'] - $monthTotal < 0): ?>
                            한도 초과!! 🤯
                        <?php else: ?>
                            <?php echo e(number_format($userData['goal'] - $monthTotal, 0, '.', ',')); ?>원 남았습니다.
                        <?php endif; ?>
                    </div>
                    <div class="text-end me-2 mt-2" style="font-size: 13px; color:#7a7a7a;">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#goalSet"><i class="fas fa-cog"></i> 설정</a>
                    </div>
                </div>                
            </div>
        </div>
    </div>

    <!-- 목표 설정 모달 -->
    <div class="modal fade" id="goalSet" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">지출 목표 설정</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(url('/setGoal')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">목표 금액</label>
                        <input type="text" name="goal" id="goal" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        닫기
                    </button>
                    <button type="submit" class="btn btn-primary">저장</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <script>
        document.getElementById("goal").addEventListener("input", function() {
            var value = this.value.trim();
            if (!value.match(/^\d*\.?\d*$/)) { // 숫자 패턴 검사
                alert("숫자만 입력할 수 있습니다.");
                this.value = ""; // 입력 필드 비우기
            }
        });
    </script>

    <div class="row mt-3">
        <div class="col text-center">
            <a class="no-deco" href="#">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-pen" style="font-size: 40px; color: #ff6b89;"></i>
                    <div class="mt-2 fw-semibold textGrey">직접 작성</div>
                </div>
            </a>
        </div>
        <div class="col text-center align-items-center">
            <a class="no-deco" href="<?php echo e(url('/scan')); ?>">
                <div class="shadow-lg card mainBtn d-flex justify-content-center">
                    <i class="fa-solid fa-receipt" style="font-size: 40px; color: #ffb223;"></i>
                    <div class="mt-2 fw-semibold">영수증 스캔</div>
                </div>
            </a>
        </div>
    </div>


    <!-- 최근 내역 -->
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="fw-bold fs-4">
                최근 내역
            </div>
            <div class="">
                <a href="#">더보기</a>
            </div>
        </div>
        <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-3 shadow-lg transaction">
            <div class="info">
                <div class="logo">e</div>
                <div class="text"><?php echo e($recent->shop); ?></div>
                <?php
                    $dateTime = new \DateTime($recent->date);
                    $month = (int) $dateTime->format('m');
                    $day = (int) $dateTime->format('d');
                ?>
                <div class="time"><?php echo e($month); ?>월 <?php echo e($day); ?>일 </div>
            </div>
            <div class="amount">- <?php echo e(number_format($recent->total, 0, '.', ',')); ?>원</div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div style="height: 30px;"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\ocrBooks\resources\views/main/index.blade.php ENDPATH**/ ?>