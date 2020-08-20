$(document).ready(function(){
  $('.txt-tel').mask('000-000-0000', {placeholder: '000-000-0000'}); //placeholder

  $( ".datepicker" ).datepicker();

  $('.ocultar').click(function(){
    $('.container-msg').hide('slow');
  });

  var lblActualizar = $('#lblFile');
  lblActualizar.hover(function(){
    $('.pop2').show();
    $('.pop2').css("display", "flex");
  });

  lblActualizar.mouseout(function(){
    $('.pop2').hide();
  })

  function Familia_Rojo(id){
    $("#" + id).css("border-left", "10px solid red");
  }

  function Familia_Azul(id){
    $("#" + id).css("border-left", "10px solid blue");
  }

});
