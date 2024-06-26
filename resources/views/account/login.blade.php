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
    <link rel="stylesheet" href="{{ asset('css/core.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
</head>
<body>
    <div class="mt-4">
        <div class="container">           
            <h1 class="mb-4 centered-title">로그인</h1>
            @if (\Session::has('IDerror'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    아이디를 찾을 수 없습니다.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif (\Session::has('PWDerror'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    비밀번호가 잘못되었습니다.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif (\Session::has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    아이디와 비밀번호를 입력하세요.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif            
            <form method="POST" action="{{ url('/login/check') }}" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="id">아이디</label>
                    <input type="text" id="id" name="uid" class="form-control">
                </div>
                <div class="form-group password-input-container">
                    <label for="password">비밀번호</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <i class="fas fa-eye-slash" id="passwordToggleIcon"></i>
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />&nbsp;
                    <label class="form-check-label" for="remember-me">로그인 상태 유지</label>
                </div>                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">로그인</button>
                </div>
                
            </form>
            <p class="forgot-password">아직 회원이 아니신가요? <a href="{{ url('signup') }}" style="color: #007bff;">회원가입</a></p>
        </div>
    </div>
    @if (\Session::has('success'))
        <script>
            alert('회원가입이 완료되었습니다.\n로그인 해주세요.');
        </script>
    @endif
</body>
</html>
