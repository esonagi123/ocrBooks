<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mypage.css">
</head>
<body>


    <div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card text-center">
                <div class="card-header">
                    저축 목표 달성 현황
                </div>
                <div class="card-body">
                    <p>목표 저축 금액: <input type="number" id="savingGoalInput" min="0" step="10000"> 원</p>
                    <p>실제 저축 금액: <input type="number" id="actualSavingInput" min="0" step="10000"> 원</p>
                    <button class="btn btn-primary" onclick="updateSavingProgress()">저축 정보 업데이트</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="progress" style="height: 30px;">
                <div id="savingProgress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                    사용자 정보 수정
                </div>
                <div class="card-body">
                    @if(Auth::check())
                        <p>사용자 정보:</p>
                        <ul>
                            <li>이름: {{ Auth::user()->name }}</li>
                            <li>이메일 주소: {{ Auth::user()->email }}</li>
                        </ul>
                        <a href="{{ route('user.edit') }}" class="btn btn-primary">회원정보 수정</a>
                    @else
                        <p>로그인이 필요합니다.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                    로그아웃
                </div>
            </div>
        </div>
    </div>
</div>

    <script>

        function updateSavingProgress() {
            const savingGoalInput = document.getElementById('savingGoalInput');
            const actualSavingInput = document.getElementById('actualSavingInput');
            const savingProgress = document.getElementById('savingProgress');

            const savingGoal = parseFloat(savingGoalInput.value);
            const actualSaving = parseFloat(actualSavingInput.value);

            if (isNaN(savingGoal) || isNaN(actualSaving) || savingGoal <= 0) {
                savingProgress.style.width = '0%';
                savingProgress.innerText = '0%';
            } else {
                const progress = Math.min((actualSaving / savingGoal) * 100, 100);
                savingProgress.style.width = progress + '%';
                savingProgress.innerText = progress.toFixed(2) + '%';
            }
        }
    </script>
</body>
</html>
