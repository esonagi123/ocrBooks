

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
<link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
<div class="row mt-4">
    <form method="post" action="<?php echo e(url('/save_result')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="uid" value="<?php echo e($userData['uid']); ?>"/>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="card mb-4">
                <h5 class="card-header">영수증 <?php echo e($data['number']); ?></h5>
                <input type="hidden" name="number[]" value="<?php echo e($data['number']); ?>"/>
                <div class="card-body">
                    <img style="width: 100%;" class="img-fluid d-flex mx-auto my-4 rounded" src="<?php echo e($data['image']); ?>">
                    <div class="mb-3">
                        <label for="shop" class="form-label">상호</label>
                        <input type="text" class="form-control" id="shop" name="shop<?php echo e($data['number']); ?>" value="<?php echo e($data['shop']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">날짜</label>
                        <input type="date" class="form-control" id="date" name="date<?php echo e($data['number']); ?>" value="<?php echo e($data['date']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">합계 금액</label>
                        <input type="text" class="form-control" id="total" name="total<?php echo e($data['number']); ?>" value="<?php echo e($data['total']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">카테고리</label>
                        <select class="form-select" name="category<?php echo e($data['number']); ?>" id="category">
                          <option selected="">선택하세요</option>
                          <option value="1">식비</option>
                          <option value="2">쇼핑</option>
                          <option value="3">교통</option>
                          <option value="4">여가</option>
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label" for="memo">메모</label>
                        <textarea id="memo" class="form-control" name="memo<?php echo e($data['number']); ?>" placeholder="이 지출에 대한 메모를 입력할 수 있습니다."></textarea>
                    </div>                                 
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">저장</button>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\ocrBooks\resources\views/books/scanResult.blade.php ENDPATH**/ ?>