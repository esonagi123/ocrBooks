<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
            font-size: 16px;
            font-weight: bold;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #424042;
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

        .card {
            margin-top: 5rem;
        }

        .card-header {
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-align: center;
            font-weight: bold;
            font-size: 2rem;
        }

        .form-group label {
            font-weight: bold;
            color: #707070;
        }

        .btn {
            font-weight: bold;
        }

        

        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-calendar-picker-indicator {
            color: #707070;
            font-weight: bold;
            font-size: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">OCR 가계부</h1>
        <form method="POST" action="#" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="name">이름</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="birth_date">생년월일</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="ID">아이디</label>
                <input type="text" id="id" name="id" class="form-control">
            </div>
            <div class="form-group">
                <label for="new_password">새로운 비밀번호</label>
                <input type="password" id="new_password" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm_password">새로운 비밀번호 확인</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">저장</button>
        </form>
    </div>
</body>
</html>
