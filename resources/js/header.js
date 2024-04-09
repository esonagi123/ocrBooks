// $(document).ready(function() {}); 를 $(function () {}); 로 줄여 쓸 수 있어요 !
$(function () {
	$('#gnb, .inner-menu').mouseenter(function () {
	  $('.inner-menu').stop().slideDown();
	});
  
	$('#gnb, .inner-menu').mouseleave(function () {
	  $('.inner-menu').stop().slideUp();
	});
  
	$('.mobile-button').click(function () {
	  alert('Hello World!');
	});
  });
  