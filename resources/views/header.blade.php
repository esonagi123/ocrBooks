<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}"/>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="/js/header.js"></script>
    <title>헤더</title>
</head>
<body>
  <!-- 헤더 시작-->
    <header>    
        <div class="Header">
          <div class="Logo">
            <a href="header.html"><img src="../img/Logo.png" /></a>
          </div>
        
          <!--카테고리 시작-->
          <div class="Header-catalogue">
            <nav>
              <ul id="gnb">
                <li class="dept1">
                  <a href="#">지출</a>
                  <ul class="inner-menu">
                    <li class="dept2"><a href="#">주간</a></li>
                    <li class="dept2"><a href="#">월간</a></li>
                  </ul>
                </li>
  
                <li class="dept1">
                  <a href="#">다이어그램</a>
                  <ul class="inner-menu">
                    <li class="dept2"><a href="#">막대</a></li>
                    <li class="dept2"><a href="#">원형</a></li>
                  </ul>
                </li>
            <!-- * 검색 영역 추가 * -->
            <div class="Header-profile">
                <a href="#"><img src="../img/profile.png" /></a>
            </div>
          </div>
          <!--카테고리 끝-->
        </div>
  
      </div>
      <div class="hd_bg"></div>
    </header>   
    <!-- 헤더 끝 -->
</body>
</html>