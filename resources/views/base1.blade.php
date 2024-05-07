@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9, user-scalable=no">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}"/>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="{{ asset('/js/header.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    <script src="{{ asset('/js/main.js') }}"></script>
</head>

  <!-- 헤더 시작-->
    <header>    
        <div class="Header">
          <div class="Logo">
            <a href="{{ url('/main') }}"><img src="../img/Logo.png" /></a>
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
<body>
    @yield('content') 
</body>

<!--푸터 시작-->
<footer>
    <div class="footer-Left">
        <div class="footer-terms">
            <ul>
            <li>개인정보처리방침</li>
            <li>이용약관</li>
            <li>서비스</li>
            <li>고객센터</li>
            </ul>
        </div>
    
        <div class="footer-social-Icon">
            <img src="../img/footer_Icon_Image/Instagram.png" class="footer-Instagram"/>
            <img src="../img/footer_Icon_Image/Blog.png" class="footer-Blog"/>
            <img src="../img/footer_Icon_Image/FaceBook.png" class="footer-FaceBook"/>
        </div>   
        </div>
</footer>
<!--푸터 끝-->
</html>