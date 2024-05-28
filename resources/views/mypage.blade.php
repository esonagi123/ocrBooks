<!DOCTYPE html>
<html lang="en">
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
                    <img class="avatar" src="{{ asset('img/avatar0.png') }}" alt="프로필" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">마이페이지</a></li>
                        <li><a class="dropdown-item" href="{{ url('m_login') }}">로그인</a></li>
                    </ul>                  
                </div>
            </div>
        </div>
    </div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-12">
            <div class="card text-center">
                <div class="card-header">
                    저축 목표 달성 현황
                </div>
                <div class="card-body">
                    <p>목표 저축 금액: <input type="number" id="savingGoalInput" min="0" step="10000" class="form-control mb-2"></p>
                    <p>실제 저축 금액: <input type="number" id="actualSavingInput" min="0" step="10000" class="form-control mb-2"></p>
                    <button class="btn btn-primary" onclick="updateSavingProgress()">저축 정보 업데이트</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 offset-md-3 col-12">
            <div class="progress" style="height: 30px;">
                <div id="savingProgress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3 col-12">
            <div class="card text-center">
                <div class="card-header">
                    개인 정보 수정
                </div>
                <div class="card-body">
                    @if(Auth::check())
                        <p>사용자 정보:</p>
                        <ul class="list-unstyled">
                            <li>이름: {{ Auth::user()->name }}</li>
                            <li>이메일 주소: {{ Auth::user()->email }}</li>
                        </ul>
                        <a href="{{ route('user.edit') }}" class="btn btn-primary">회원정보 수정</a>
                    @else
                        <p class="small text-muted">로그인이 필요합니다.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3 col-12">
            <div class="card text-center">
                <div class="card-header">
                    로그아웃
                </div>
                <div class="card-body">
                    @if(Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">로그아웃</button>
                        </form>
                    @else
                        <p class="small text-muted">로그인이 필요합니다.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warningModalLabel">경고</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                올바른 값을 넣어주세요 !
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
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
            const warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
            warningModal.show();
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
