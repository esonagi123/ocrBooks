<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- 화면 해상도에 따라 글자 크기 대응(모바일 대응) -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
  
  <!-- Chart Js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.0/echarts.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.0/dist/echarts.min.js"></script>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

  <!-- 사용자 프로필 및 드롭다운 -->
  <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="avatar0.png" alt="User Avatar" width="30" height="30" class="rounded-circle">
    </a>
    <ul class="dropdown-menu" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="#">프로필</a></li>
      <li><a class="dropdown-item" href="#">설정</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">로그아웃</a></li>
    </ul>
  </div>
  </header><!-- End Header -->

  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
            <!-- Cost Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card Cost-card">
                <div class="card-body">
                  <h5 class="card-title">Cost <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Cost Card -->

            <!--  budgetChart -->
            <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Category analysis <span></span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['This Month', 'Last Month']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: '통신',
                          max: 6500
                        },
                        {
                          name: '주거',
                          max: 16000
                        },
                        {
                          name: '식비',
                          max: 30000
                        },
                        {
                          name: '쇼핑',
                          max: 38000
                        },
                        {
                          name: '교통',
                          max: 52000
                        },
                        {
                          name: '미용',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'This Month vs Last Month',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'This Month'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Last Month'
                        }
                      ]
                    }]
                  });
                });
              </script>
            </div>
          </div><!-- End Budget Report -->

            <!-- Expenses List -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Expenses List <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">제품사진</th>
                        <th scope="col">제품명</th>
                        <th scope="col">지출액</th>
                        <th scope="col">잔액</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a>사진1</th>
                        <td><a href="#" class="text-primary fw-bold">product 1</a></td>
                        <td>$64</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a>사진2</th>
                        <td><a href="#" class="text-primary fw-bold">product 2</a></td>
                        <td>$46</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a>사진3</th>
                        <td><a href="#" class="text-primary fw-bold">product 3</a></td>
                        <td>$59</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a>사진4</th>
                        <td><a href="#" class="text-primary fw-bold">product 4</a></td>
                        <td>$32</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a>사진5</th>
                        <td><a href="#" class="text-primary fw-bold">product 5</a></td>
                        <td>$79</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Expenses List -->
      </div>
    </section>
  </main><!-- End #main -->
</body>
</html>