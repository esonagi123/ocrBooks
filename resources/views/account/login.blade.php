<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}"/>
    <title>로그인</title>
</head>
<body>
    <div class="container">
        <h2>OCR 가계부 로그인</h2>
        <form method="POST" action="#">
            @csrf
            <label for="id">ID</label>
            <input type="text" id="id" name="id">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <button type="submit">로그인</button>
        </form>
    </div>
</body>
</html>
