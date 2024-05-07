$(document).ready(function () {
	/*List date*/
  var date = new Date("2024/03/11");

	var year = date.getFullYear();
	var month = date.getMonth()+1;
	var day = date.getDate();
  	var dayoftheweek = date.getDay();

  if (month < 10) {
  	month = "0" + month;
  }
  
  if (day < 10) {
  	day = "0" + day;
  }
  
	$('#setDate').append(year + '-' + month + '-' + day);
  
 
  $('#yesterday').append(year + '-' + month + '-' +(date.getDate() - 1));

  $('#tomorrow').append(year + '-' + month + '-' +(date.getDate() + 1));
  

  date.setMonth(date.getMonth() + 1);
  $('#nextMonth').append(date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate());
  
});

date.setMonth(date.getMonth() + 1);
date.getFullYear(), date.getMonth() + 1, date.getDate()


/*table scroll*/
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();