@extends('base')

@section('content')
<link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
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
                        <a href="{{ url('edit') }}" class="btn btn-primary">회원정보 수정</a>
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
                        <form method="POST" action="{{ url('logout') }}">
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
@endsection()
