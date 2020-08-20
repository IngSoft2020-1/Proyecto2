$(document).ready(function(){
    $( ".datepicker" ).datepicker();

    $('.title-box').html("¿Estás seguro que quieres salir sin guardar los cambios?");

    $('.btn-confirm').click(function(){
    location.href = "reservation.php";
    });

    $('.btn-confirm').addClass('click');

    $('.click').click(function(){

    });

    $('#btn-cancel-2').click(function(){
        $('.box').hide();
    });

    /*
      CODIGO DE MIGRANT.JS

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
    */
});
