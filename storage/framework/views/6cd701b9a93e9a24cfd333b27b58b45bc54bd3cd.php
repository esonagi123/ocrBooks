<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    
    <!-- 부트스트랩 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/649102945e.js" crossorigin="anonymous"></script>

    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- CSS 로드 -->
    <link rel="stylesheet" href="<?php echo e(asset('css/core.css')); ?>">
    
  
      <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />
  </head>
  <body>
    <div class="ms-3 me-3">

      <nav class="topBar">
      <div class="container">
          <div class="row text-center align-items-center" >
              <div class="col-8">
                  <div class="row textGrey fw-medium">
                    환영합니다!
                  </div>
                  <div class="row fw-bold">
                    <?php echo e($userData['name']); ?> 님
                  </div>
              </div>
              <div class="col text-end">
                  <div class="dropdown">
                    <img class="avatar" src="<?php echo e(asset('img/avatar0.png')); ?>" alt="프로필" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="<?php echo e(url('/mypage')); ?>">마이페이지</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">로그아웃</a></li>
                    </ul>                  
                  </div>
                </div>
          </div>
        </div>
      </nav>
      <div class="page">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
      <div style="margin-top:100px;">
        <div class="botFixedBar shadow-lg d-flex align-items-center">
          <div class="container">
              <div class="row">
                <div class="col-4">
                  <a href="<?php echo e(url('/')); ?>">
                    <i class="fas fa-arrow-left" style="font-size:25px; color: #82888c;"></i>
                  </a>
                </div>              
                  <div class="col-4">
                    <a href="<?php echo e(url('/')); ?>">
                      <i class="fa-solid fa-house-chimney" style="font-size:25px; color: #7a8cff;"></i>
                    </a>
                  </div>
                  <div class="col-4">
                    <a href="<?php echo e(url('/uselist')); ?>">
                    <i class="fas fa-history" style="font-size:25px; color: #82888c;"></i>
                    </a>
                  </div>  
              </div>      
          </div>
        </div>
      </div>
  </body>
</html><?php /**PATH C:\xampp\ocrBooks\resources\views/base.blade.php ENDPATH**/ ?>