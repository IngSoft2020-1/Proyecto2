$(document).ready(function(){

    /* BOTON CANCELAR */
    $('#btn-cancel').click(function(){
        // ACTUALIZAR VENTANA PADRE DENTRO DE UN IFRAME
        parent.location.reload();
    });

    /* MENSAJE MIGRANTE GUARDADO */
  var datosbien = localStorage.getItem('datosBienMigrant');
  if(datosbien == '1'){
    $('#datosBienMigrant').css("display", "flex");
    $('#datosBienMigrant').show();
  }
  $('.btn-confirm').click(function(){
    localStorage.setItem('datosBienMigrant', 0);
    $('.box').hide();
  });

  /* MENSAJE ERROR DE DATOS */
  var datosmal = localStorage.getItem('datosMalMigrant');
  if(datosmal == '1'){
    $('#datosMalMigrant').css("display", "flex");
    $('#datosMalMigrant').show();
  }
  $('.btn-confirm').click(function(){
    localStorage.setItem('datosMalMigrant', 0);
    $('.box').hide();
  });
});
