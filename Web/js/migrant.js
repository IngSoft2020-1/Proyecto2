$(document).ready(function(){
  $('.txt-tel').mask('000-000-0000', {placeholder: '000-000-0000'}); //placeholder

  $( ".datepicker" ).datepicker();

  $('.ocultar').click(function(){
    $('.container-msg').hide('slow');
  });
});
