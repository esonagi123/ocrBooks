    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('/css/login.css') }}"/>
        <title></title>
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
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .container {
            margin: 0 auto;
            padding: 70px;
        }

        .password-input-container {
            position: relative;
        }

        #passwordToggleIcon {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <h1>OCR 가계부 로그인</h1>
            <form method="POST" action="#">
                @csrf
                <label for="id">ID</label>
                <input type="text" id="id" name="id">
                <label for="password">Password</label>
                <div class="password-input-container">
                <input type="password" id="password" name="password">
                <i class="fas fa-eye-slash" id="passwordToggleIcon" onclick="togglePasswordVisibility()"></i>
                </div>
                <button type="submit">로그인</button>
                <button type="submit">회원가입</button>
            <h5>아이디 또는 비밀번호를 잊으셨나요?</h5>
            </form>
        </div>
    </body>
    </html>
