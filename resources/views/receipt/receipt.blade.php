<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>영수증 업로드 페이지</title>
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <style>
    @media (max-width: 768px) {
      .flex-md-row {
        flex-direction: column !important;
      }
      .fixed-bottom {
        position: static !important;
      }
    }
  </style>
</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="Folder-fill" viewBox="0 0 16 16">
  <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981z"/>
  </symbol>

  <symbol id="image-fill" viewBox="0 0 16 16">
    <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
  </symbol>

  <symbol id="camera-fill" viewBox="0 0 16 16">
  <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0"/>
  </symbol>
</svg>

<div class="container-fluid">
  <div class="row justify-content-center p-4">
    <nav class="col-md-8 col-lg-6">
      <ul class="list-unstyled d-flex flex-column gap-2">
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#camera-fill"></use></svg>
            <div>
              <strong class="d-block"> 직접 찍기🤳</strong>
              <small>직접 사진을 찍어주세요!</small>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#image-fill"></use></svg>
            <div>
              <strong class="d-block"> 사진 선택📷</strong>
              <small>사진을 선택해주세요!</small>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
            <svg class="bi" width="24" height="24"><use xlink:href="#Folder-fill"></use></svg>
            <div>
              <strong class="d-block"> 파일 선택📂</strong>
              <small>파일을 선택해주세요!</small>
            </div>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <!-- Toast container -->
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="toast-container">
        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">System</div>
            <small>2 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            업로드 성공🎉
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../assets/vendor/js/helpers.js"></script>
<script src="../assets/js/config.js"></script>
</body>
</html>
