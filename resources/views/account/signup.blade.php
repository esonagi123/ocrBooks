<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/signup.css') }}"/>
    <title></title>
</head>
<body>
    <div class="container">
        <h2>회원 가입</h2>
        <form method="POST" action="#">
            @csrf
            <label for="username">사용자 이름</label>
            <input type="text" id="username" name="username" required>

            <label for="phonenumber">전화번호</label>
            <input type="phonenumber" id="phonenumber" name="phonenumber" required>

            <label for="password">비밀번호</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">비밀번호 확인</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">가입하기</button>
            
        </form>
    </div>
</body>
</html>
