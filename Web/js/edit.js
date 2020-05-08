$(document).ready(function(){
  // DIALOGO
  $("#btn-change").click(function(){
    $(".popup").dialog();
  });

  var btn_change = $("#btn-change");

  btn_change.click(function(){
    $(".container").css("filter", "blur(4px)");
  });

  var btn_save = $("#button-save-2");
  btn_save.click(function(){
    $(".container").css("filter", "blur(0px)");
  });

  var btn_cancel = $("#button-cancel");
  btn_cancel.click(function(){
    $(".container").css("filter", "blur(0px)");
    $( ".popup" ).dialog( "destroy" );
  });
});
