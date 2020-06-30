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
});
