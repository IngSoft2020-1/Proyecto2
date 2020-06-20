$(document).ready(function() {
  $('.datepicker').datepicker();
  var submenu;
  // EVENTOS PARA CAMBIAR EL COLOR DE FONDO DEL CONTENENDOR DE LOS TRES PUNTITOS
  $('.icon').hover(function(){
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
    submenu.toggle('slow');
  });

  function GetID(_this){
    // OBTIENE EL TR
    var element = $(_this)[0].parentElement.parentElement.parentElement;
    // OBTIENE EL VALOR DEL ID, ES UN VALOR NUMERICO
    var ID = $(element).attr('id');
    return ID;
  }
});
