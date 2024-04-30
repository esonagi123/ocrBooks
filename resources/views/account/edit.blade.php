<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/edit.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-success">
                    <div class="card-header">
                        <h2 class="text-center font-weight-bold text-white">사용자 정보 수정</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="font-weight-bold text-white">이름</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="birth_date" class="font-weight-bold text-white">생년월일</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="font-weight-bold text-white">새로운 비밀번호</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="font-weight-bold text-white">새로운 비밀번호 확인</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <div class="form-group">
                                <label for="profile_image" class="font-weight-bold text-white">프로필 이미지</label>
                                <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                            </div>
                            <button type="submit" class="btn btn-light btn-block">저장</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
