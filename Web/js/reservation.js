$(document).ready(function() {
  $('.datepicker').datepicker();
  $('.icon').hover(function(){
    $('.evento').css("background", "#32424c");
  });
  $('.icon').mouseout(function(){
    $('.evento').css("background", "#27333b");
  });
});
