<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('/img/isaac-smith-AT77Q0Njnt0-unsplash.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #707070;
            font-family: 'Arial';
        }

        .container {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            padding: 40px;
            max-width: 400px;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }

        label {
            color: #707070;
        }

        input[type="text"],
        input[type="password"] {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .password-input-container {
            position: relative;
        }

        #passwordToggleIcon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }

        button[type="submit"] {
            padding: 10px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            font-family: 'Arial';
            cursor: pointer;
        }

        .forgot-password {
            text-align: center;
            margin-top: 70px;
            color: #707070;
            font-size: 12px;
        }

        .mb-4 {
            text-align: center;
            color: #333;
            font-size: 12px;
            margin-bottom: 20px;
            font-family: 'Arial';
            font-weight: bold;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1 class="mb-4" style="font-size: rem; font-weight: bold; font-family: 'Palatino'; color: #424042;">OCR 가계부</h1>
        <form method="POST" action="#" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="id">아이디</label>
                <input type="text" id="id" name="id" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <div class="password-input-container">
                    <input type="password" id="password" name="password" class="form-control">
                    <i class="fas fa-eye-slash" id="passwordToggleIcon" onclick="togglePasswordVisibility()"></i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">로그인</button>
        </form>
        <p class="forgot-password">아이디 또는 비밀번호를 잊으셨나요? <a href="#" style="color: #007bff;">회원가입</a></p>
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
    </script>
</body>
</html>
