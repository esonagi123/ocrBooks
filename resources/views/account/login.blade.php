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
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">마이페이지</a></li>
                            <li><a class="dropdown-item" href="{{ url('m_login') }}">로그인</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">           
            <h1 class="mb-4 centered-title">로그인</h1>
            <form method="POST" action="#" class="mb-4" onsubmit="return handleLogin(event)">
                <div class="form-group">
                    <label for="id">아이디</label>
                    <input type="text" id="id" name="id" class="form-control">
                </div>
                <div class="form-group password-input-container">
                    <label for="password">비밀번호</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <i class="fas fa-eye-slash" id="passwordToggleIcon" onclick="togglePasswordVisibility()"></i>
                </div>
                <button type="submit" class="btn btn-primary btn-block">로그인</button>
            </form>
            <div id="loginAlert" class="alert alert-danger d-none" role="alert">
                아이디 또는 비밀번호가 맞지 않습니다 !
            </div>
            <p class="forgot-password">아이디 또는 비밀번호를 잊으셨나요? <a href="{{ url('signup') }}" style="color: #007bff;">회원가입</a></p>
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

        function handleLogin(event) {
            event.preventDefault();
            var id = document.getElementById("id").value;
            var password = document.getElementById("password").value;

            if (id !== "expectedUsername" || password !== "expectedPassword") {
                document.getElementById("loginAlert").classList.remove("d-none");
            } else {
                event.target.submit();
            }
        }
    </script>
</body>
</html>
