<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 부트스트랩 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/649102945e.js" crossorigin="anonymous"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- CSS 로드 -->
    <link rel="stylesheet" href="<?php echo e(asset('css/core.css')); ?>?v=<?php echo e(time()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />
</head>
<body>
<div class="ms-4 me-4">
    <div class="container">
        <div class="row mt-4 text-center align-items-center">
            <div class="col-8">
                <div class="row textGrey fw-medium">
                    환영합니다!
                </div>
            </div>
            <div class="col text-end">
                <div class="dropdown">
                    <img class="avatar" src="<?php echo e(asset('img/avatar0.png')); ?>" alt="프로필" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">마이페이지</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(url('m_login')); ?>">로그인</a></li>
                    </ul>                  
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="mb-4 centered-title">회원 정보 수정</h1>
        <form id="updateForm" method="POST" action="#" class="mb-4">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="ID">아이디</label>
                <input type="text" id="id" name="id" class="form-control">
            </div>
            <div class="form-group">
                <label for="e_mail">이메일</label>
                <input type="e_mail" id="e_mail" name="e_mail" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">이름</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e($userData['name']); ?>" readonly>
            </div>
            <div class="form-group password-input-container">
                <label for="new_password">새로운 비밀번호</label>
                <input type="password" id="new_password" name="new_password" class="form-control">
                <i class="fas fa-eye-slash" id="passwordToggleIcon" onclick="togglePasswordVisibility()"></i>
            </div>
            <div class="form-group password-input-container">
                <label for="confirm_password">새로운 비밀번호 확인</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                <i class="fas fa-eye-slash" id="confirmPasswordToggleIcon" onclick="toggleConfirmPasswordVisibility()"></i>
            </div>
            <button type="button" class="btn btn-primary btn-block" onclick="checkAndShowAlert()">수정</button>
            <div id="alert" class="alert alert-dark d-none" role="alert">
                모든 칸을 채워주세요!
            </div>
        </form>
    </div>
    <div style="margin-top:100px;margin-left:-5%;">
        <div class="botFixedBar shadow-lg d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <a href="<?php echo e(url('/')); ?>">
                            <i class="fa-solid fa-house-chimney" style="font-size:25px; color: #9b7aff;"></i>
                        </a>
                    </div>
                    <div class="col-6">
                        <i class="fa-solid fa-chart-pie" style="font-size:25px; color: #82888c;"></i>
                    </div>  
                </div>      
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("new_password");
            var icon = document.getElementById("passwordToggleIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }

        function toggleConfirmPasswordVisibility() {
            var confirmPasswordInput = document.getElementById("confirm_password");
            var icon = document.getElementById("confirmPasswordToggleIcon");
            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                confirmPasswordInput.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }

        function checkAndShowAlert() {
            var email = document.getElementById("e_mail").value;
            var name = document.getElementById("name").value;
            var newPassword = document.getElementById("new_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (email === "" || name === "" || newPassword === "" || confirmPassword === "") {
                document.getElementById("alert").classList.remove("d-none");
            } else {
                document.getElementById("alert").classList.add("d-none");
                document.getElementById("updateForm").submit();
            }
        }
    </script>
</div>
</body>
</html>
<?php /**PATH C:\xampp\ocrBooks\resources\views/account/edit.blade.php ENDPATH**/ ?>