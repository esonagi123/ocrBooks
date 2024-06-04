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
<div class="mt-5 container">
    <h2 class="centered-title">회원 가입</h2>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo e($error); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <form id="signupForm" method="POST" action="<?php echo e(url('/signup/store')); ?>" class="mb-4">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="ID"><span style="color: red;">*&nbsp;</span>아이디</label>
            <input type="text" id="id" name="uid" class="form-control" value="<?php echo e(old('name')); ?>">
        </div>
        <div class="form-group">
            <label for="e_mail"><span style="color: red;">*&nbsp;</span>이메일</label>
            <input type="text" id="e_mail" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
        </div>
        <div class="form-group">
            <label for="name"><span style="color: red;">*&nbsp;</span>이름</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
        </div>
        <div class="form-group password-input-container">
            <label for="new_password"><span style="color: red;">*&nbsp;</span>새로운 비밀번호</label>
            <input type="password" id="new_password" name="password" class="form-control">
            <i class="fas fa-eye-slash" id="passwordToggleIcon" onclick="togglePasswordVisibility()"></i>
        </div>
        <div class="form-group password-input-container">
            <label for="confirm_password"><span style="color: red;">*&nbsp;</span>새로운 비밀번호 확인</label>
            <input type="password" id="confirm_password" name="password_confirmation" class="form-control">
            <i class="fas fa-eye-slash" id="confirmPasswordToggleIcon" onclick="toggleConfirmPasswordVisibility()"></i>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-primary btn-block" onclick="checkAndShowTermsModal()">가입</button>
        </div>
    </form>
</div>

<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">이용약관</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>1. 회원가입</p>
                <p>1-1. 회원가입은 이용자가 약관에 동의한 후 가입신청을 하면 이용자가 등록한 개인정보를 회사가 승인하는 것으로 가입이 완료됩니다.</p>
                <p>1-2. 회원은 회원가입 시 기재한 정보를 성실하게 입력하여야 하며, 회원가입 시 기재한 정보가 변경되었을 경우 이를 즉시 수정하여야 합니다.</p>
                <p>2. 개인정보보호</p>
                <p>2-1. 회사는 이용자의 개인정보를 보호하기 위해 최선을 다하며, 회사의 개인정보보호정책에 따라 이용자의 개인정보를 수집, 이용, 보관, 파기합니다.</p>
                <p>2-2. 회사는 이용자의 개인정보를 제3자에게 제공하지 않으며, 개인정보보호정책에 위배되는 행위를 하지 않습니다.</p>
                <p>3. 책임</p>
                <p>3-1. 회사는 이용자의 편의를 위해 최선을 다하며, 이용자가 회사의 서비스를 이용함에 있어서 발생하는 문제에 대해 일정한 법적 책임을 부담합니다.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                <button type="button" class="btn btn-primary" onclick="submitForm()">동의 및 가입</button>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
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

    function checkAndShowTermsModal() {
        var termsModal = new bootstrap.Modal(document.getElementById('termsModal'), {});
        termsModal.show();
    }

    function submitForm() {
        document.getElementById("signupForm").submit();
    }
</script>
</body>
</html>
<?php /**PATH C:\xampp\ocrBooks\resources\views/account/signup.blade.php ENDPATH**/ ?>