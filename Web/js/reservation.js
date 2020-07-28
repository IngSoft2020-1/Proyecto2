$(document).ready(function() {
  $('.datepicker').datepicker();
  var submenu;
  // EVENTOS PARA CAMBIAR EL COLOR DE FONDO DEL CONTENENDOR DE LOS TRES PUNTITOS
  $('.icon').click(function(){
    var _this = this;
    $('.evento-'+GetID(_this)).css("background", "#32424c");
  });
  $('.icon').mouseout(function(){
    var _this = this;
    $('.evento-'+GetID(_this)).css("background", "none");
  });
  // FIN DE EVENTO

  $('.icon').click(function(){
    var _this = this;
    var bool = true;
    submenu = $('.sub-menu-'+GetID(_this));
    for(var i = 0; i <= 10000; i++){
      if(GetID(_this) == i){}
      else{
        $('.sub-menu-'+i).hide();
      }
    }
    submenu.toggle();
  });

  // FUNCIONES ***********************************************
  function GetID(_this){
    // OBTIENE EL TR
    var element = $(_this)[0].parentElement.parentElement.parentElement;
    // OBTIENE EL VALOR DEL ID, ES UN VALOR NUMERICO
    var ID = $(element).attr('id');
    return ID;
  }

  function Habilitar_Deshabilitar(id, disabled, cursor){
    $('tbody #' + id + ' .habilitar').prop("disabled", disabled).css("cursor", cursor);
  }

  function Estado(id, status){
    var element = $('#estado-'+id);
    element.text(status);
    $('.sub-menu').hide();
    if(status ==  "En curso"){
      $('#'+id).css("border-left", "10px solid green");
      $('.btn-cancel').show();
      $('.btn-start').hide();
      $('.btn-edit').hide();
    }
    else if(status ==  "En espera"){
      // AQUI SE VA A MANDAR A LLAMAR CUANDO ESTE FINALIZADA
      // ESPERANDO RESPUESTA DE BACK
      $('#'+id).css("border-left", "10px solid yellow");
      $('.btn-cancel').hide();
      $('.btn-start').show();
      $('.btn-edit').show();
    }
  }
  // FIN FUNCIONES ***********************************************

  // FUNCION PARA AL DAR CLICK EN INICIAR SE INICIE LA RESERVACION
  var btnStart = $('.btn-start');
  btnStart.click(function(){
    var _this = this;
    Estado(GetID(_this), 'En curso');
    Habilitar_Deshabilitar(GetID(_this), "on", "default");
  });

  var btnCancel = $('.btn-cancel');
  btnCancel.click(function(){
    var _this = this;
    Estado(GetID(_this), 'En espera');
    Habilitar_Deshabilitar(GetID(_this), false, "pointer");
  });

  var btnEdit = $('.btn-edit');
  
});

document.addEventListener("DOMContentLoaded", function(event){
  var icon = $('.icon');
  icon.css("background","blue");
  // se tendra que clonar un tr para que se puedan aplicar los eventos y estilos
});
