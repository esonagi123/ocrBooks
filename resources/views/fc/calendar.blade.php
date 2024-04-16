<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8' />
  <!-- 화면 해상도에 따라 글자 크기 대응(모바일 대응) -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <!-- jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- fullcalendar CDN -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js'></script>
  <!-- fullcalendar 언어 CDN -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js'></script>
  <!-- axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- 부트스트랩CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- 부트스트랩CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
 
  <!-- CSS 로드 -->
  <link rel="stylesheet" href="http://localhost/css/mobile.css">
    <link rel="stylesheet" href="http://localhost/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="http://localhost/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    
 <style>
    /* body 스타일 */
    html, body {
      overflow: hidden;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }
    /* 캘린더 위의 해더 스타일(날짜가 있는 부분) */
    .fc-header-toolbar {
      padding-top: 1em;
      padding-left: 1em;
      padding-right: 1em;
    }
  </style>
</head>
<body style="padding:30px;">

  <!-- calendar 태그 -->
  <div id='calendar-container'>
    <div id='calendar'></div>
  </div>

  <!-- 사용자 프로필 및 드롭다운 -->
  <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="avatar0.png" alt="User Avatar" width="30" height="30" class="rounded-circle">
      John Doe
    </a>
    <ul class="dropdown-menu" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="#">프로필</a></li>
      <li><a class="dropdown-item" href="#">설정</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">로그아웃</a></li>
    </ul>
  </div>

 <!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">일정 및 지출 추가</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="eventForm">
          <!-- 이벤트 관련 입력 필드 -->
          제목 : <input type="text" id="eventTitle" /><br />
          시작 날짜 : <input type="datetime-local" id="eventStart" /><br />
          종료 날짜 : <input type="datetime-local" id="eventEnd" /><br />
        </div>
        <div id="expenseForm" style="display:none;">
          <!-- 지출 관련 입력 필드 -->
          지출명 : <input type="text" id="expenseTitle" /><br />
          날짜 : <input type="datetime-local" id="expenseStart" /><br />
          금액 : <input type="number" id="expenseAmount" /><br />
          카테고리 :
          <select id="expenseCategory">
            <option value="식비">식비</option>
            <option value="교통">교통</option>
            <option value="통신">통신</option>
            <option value="미용">미용</option>
            <option value="주거">주거</option>
            <option value="쇼핑">쇼핑</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
        <button type="button" class="btn btn-primary" id="saveAdd">추가</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {
  var calendarEl = $('#calendar')[0];
  var calendar = new FullCalendar.Calendar(calendarEl, {
    // 기존 설정...
  });

  // 모달에서 라디오 버튼 변경 시 해당하는 입력 필드 보여주기
  $('input[name=addType]').on('change', function () {
    if (this.value === 'event') {
      $('#eventForm').show();
      $('#expenseForm').hide();
    } else if (this.value === 'expense') {
      $('#eventForm').hide();
      $('#expenseForm').show();
    }
  });

  // 추가 버튼 클릭 시
  $('#saveAdd').on('click', function () {
    var selectedForm = $('input[name=addType]:checked').val();
    if (selectedForm === 'event') {
      // 이벤트 추가 처리...
    } else if (selectedForm === 'expense') {
      // 지출 추가 처리...
    }
    // 모달 닫기
    $('#addModal').modal('hide');
  });

  // 나머지 코드...
});

  $(function () {
    var calendarEl = $('#calendar')[0];
      var calendar = new FullCalendar.Calendar(calendarEl, {
        googleCalendarApiKey: '', // 여기에 구글캘린더 api키 입력하시면 됩니다.
        height: '700px', // calendar 높이 설정
        expandRows: true, // 화면에 맞게 높이 재설정
        slotMinTime: '08:00', // Day 캘린더에서 시작 시간
        slotMaxTime: '20:00', // Day 캘린더에서 종료 시간
        customButtons: {
          myCustomButton: {
            text: "일정추가",
            click: function () {
              // 부트스트랩 모달 열기
              
              $("#eventModal").modal("show");
            }
          },

          myExpenseButton: {
            text: "지출추가",
            click: function () {
              // 부트스트랩 모달 열기
              $("#expenseModal").modal("show");
            }
          },

          mySaveButton: {
            text: "저장하기",
            click: async function () {
              if (confirm("저장하시겠습니까?")) {
                //지금까지 생성된 모든 이벤트 저장하기
                var allEvent = calendar.getEvents();
                console.log("모든 이벤트들", allEvent);
                //이벤트 저장하기
                const saveEvent = await axios({
                  method: "POST",
                  url: "/calendar",
                  data: allEvent,
                });
              }
            }
          },
        },

        // 해더에 표시할 툴바
        headerToolbar: {
          left: 'prev,next today,myCustomButton,myExpenseButton,mySaveButton',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        initialView: 'dayGridMonth', // 초기 로드 될때 보이는 캘린더 화면(기본 설정: 달)
        navLinks: true, // 날짜를 선택하면 Day 캘린더나 Week 캘린더로 링크
        editable: true, // 수정 가능?
        selectable: true, // 달력 일자 드래그 설정가능
        nowIndicator: true, // 현재 시간 마크
        dayMaxEvents: true, // 이벤트가 오버되면 높이 제한 (+ 몇 개식으로 표현)
        locale: 'ko', // 한국어 설정
        eventAdd: function (obj) { // 이벤트가 추가되면 발생하는 이벤트
          console.log(obj);
        },
        eventChange: function (obj) { // 이벤트가 수정되면 발생하는 이벤트
          console.log(obj);
        },
        eventRemove: function (obj) { // 이벤트가 삭제되면 발생하는 이벤트
          console.log(obj);
        },

        // 캘린더에서 드래그로 이벤트를 생성할 수 있다.
        select: function (arg) {
          var title = prompt('지출명:');
          var amount = prompt('금액:');
          if (title && amount) { // title과 amount가 모두 존재하는 경우에만 추가
            calendar.addEvent({
              title: title + ' (' + amount + '원)', // 지출명과 금액을 함께 표시
              start: arg.start,
              allDay: arg.allDay,
              // 추가한 부분 - 지출 정보를 저장하기 위해 data 객체로 추가
              data: {
                amount: amount,
                category: $('#category').val() // 선택된 카테고리 값
              }
            });
          }
          calendar.unselect();
        },

        //데이터 가져오는 이벤트
        eventSources: [
          {
            events: async function (info, successCallback, failureCallback) {
              const eventResult = await axios({
                method: "POST",
                url: "/eventData",
              });
              const eventData = eventResult.data;
              //이벤트에 넣을 배열 선언하기
              const eventArray = [];
              eventData.forEach((res) => {
                eventArray.push({
                  title: res.title,
                  start: res.start,
                  end: res.end,
                  backgroundColor: res.backgroundColor,
                });
              });
              successCallback(eventArray);
            },
          },
          {
            googleCalendarId: 'ko.south_korea.official#holiday@group.v.calendar.google.com',
            backgroundColor: 'red',
          }
        ]
      });

      // 캘린더 랜더링
      calendar.render();

      // 지출 추가 버튼 클릭 시
      $('#saveExpense').on('click', function () {
        // 지출 정보 가져오기
        var expenseData = {
          title: $("#expenseTitle").val(),
          start: $("#expenseStart").val(),
          amount: $("#expenseAmount").val(),
          category: $("#expenseCategory").val()
        };
        //빈값입력시 오류
        if (
          expenseData.title == "" ||
          expenseData.start == "" ||
          expenseData.amount == "" ||
          expenseData.category == ""
        ) {
          alert("입력하지 않은 값이 있습니다.");
        } else {
          // 이벤트 추가
          calendar.addEvent({
            title: expenseData.title + ' (' + expenseData.amount + '원)', // 지출명과 금액을 함께 표시
            start: expenseData.start,
            // 추가한 부분 - 지출 정보를 저장하기 위해 data 객체로 추가
            data: {
              amount: expenseData.amount,
              category: expenseData.category
            }
          });
          $("#expenseModal").modal("hide");
          // 입력값 초기화
          $("#expenseTitle").val("");
          $("#expenseStart").val("");
          $("#expenseAmount").val("");
          $("#expenseCategory").val("");
        }
      });

      // 일정 추가 버튼 클릭 시
      $('#saveEvent').on('click', function () {
        var eventData = {
          title: $("#eventTitle").val(),
          start: $("#eventStart").val(),
          end: $("#eventEnd").val()
        };

        //빈값입력시 오류
        if (
          eventData.title == "" ||
          eventData.start == "" ||
          eventData.end == ""
        ) {
          alert("입력하지 않은 값이 있습니다.");
        } else {
          // 이벤트 추가
          calendar.addEvent(eventData);
          $("#eventModal").modal("hide");
          // 입력값 초기화
          $("#eventTitle").val("");
          $("#eventStart").val("");
          $("#eventEnd").val("");
        }
      });

      // 데이터 저장하기 버튼 클릭 시
      $('#saveData').on('click', function () {
        // 저장된 데이터 가져와서 서버에 전송하거나 다른 작업 수행
        var savedEvents = getFromLocalStorage('events');
        var savedExpenses = getFromLocalStorage('expenses');
        // 서버에 전송하거나 다른 작업 수행
        console.log(savedEvents);
        console.log(savedExpenses);
      });

      // 로컬 스토리지에 데이터 저장하기
      function saveToLocalStorage(key, data) {
        var storedData = JSON.parse(localStorage.getItem(key)) || [];
        storedData.push(data);
        localStorage.setItem(key, JSON.stringify(storedData));
      }

      // 로컬 스토리지에서 데이터 가져오기
      function getFromLocalStorage(key) {
        return JSON.parse(localStorage.getItem(key)) || [];
      }

    });
</script>
</body>
</html>
