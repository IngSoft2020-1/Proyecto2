$(document).ready(function(){

    /* BOTON CANCELAR */
    $('#btn-cancel').click(function(){
        // ACTUALIZAR VENTANA PADRE DENTRO DE UN IFRAME
        // parent.location.reload();
        // console.log($('.box'));
        $('#sure').show();
        $('#sure').css("display", "flex");
    });

    /* MENSAJE MIGRANTE GUARDADO */
  var datosbien = localStorage.getItem('datosBienMigrant');
  if(datosbien == '1'){
    $('#datosBienMigrant').css("display", "flex");
    $('#datosBienMigrant').show('slow');
  }
  // $('.btn-confirm').click(function(){
  //   localStorage.setItem('datosBienMigrant', 0);
  //   $('.box').hide('slow');
  // });

  /* MENSAJE ERROR DE DATOS */
  var datosmal = localStorage.getItem('datosMalMigrant');
  if(datosmal == '1'){
    $('#datosMalMigrant').css("display", "flex");
    $('#datosMalMigrant').show('slow');
  }
  $('.btn-confirm').click(function(){
    localStorage.setItem('datosMalMigrant', 0);
    $('.box').hide('slow');
  });

  
});
