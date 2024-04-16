<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>가계부</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mypage.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        지출 현황
                    </div>
                    <div class="card-body">
                        <canvas id="expenseChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        수입 현황
                    </div>
                    <div class="card-body">
                        <canvas id="incomeChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        지출 현황
                    </div>
                    <div class="card-body">
                        <canvas id="expensePieChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        수입 현황
                    </div>
                    <div class="card-body">
                        <canvas id="incomePieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
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

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        로그아웃
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const expenseCtx = document.getElementById('expenseChart').getContext('2d');
        const expenseChart = new Chart(expenseCtx, {
            type: 'bar',
            data: {
                labels: ['식비', '교통비', '여가비', '이체', '기타'],
                datasets: [{
                    label: '지출 금액',
                    data: [200000, 150000, 100000, 50000, 0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(35, 102, 1, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(35, 102, 1, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const incomeCtx = document.getElementById('incomeChart').getContext('2d');
        const incomeChart = new Chart(incomeCtx, {
            type: 'bar',
            data: {
                labels: ['월급', '용돈', '부수입', '기타'],
                datasets: [{
                    label: '수입 금액',
                    data: [4000000, 3000000, 2000000, 1000000],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(35, 102, 1, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(35, 102, 1, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const expensePieCtx = document.getElementById('expensePieChart').getContext('2d');
        const expensePieChart = new Chart(expensePieCtx, {
            type: 'doughnut',
            data: {
                labels: ['식비', '교통비', '여가비', '이체', '기타'],
                datasets: [{
                    data: [200000, 150000, 100000, 50000, 0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(35, 102, 1, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(35, 102, 1, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const incomePieCtx = document.getElementById('incomePieChart').getContext('2d');
        const incomePieChart = new Chart(incomePieCtx, {
            type: 'doughnut',
            data: {
                labels: ['월급', '용돈', '부수입', '기타'],
                datasets: [{
                    data: [4000000, 3000000, 2000000, 1000000],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(35, 102, 1, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(35, 102, 1, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

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
