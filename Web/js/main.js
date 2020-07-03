$(document).ready(function(){

  // ***************************************************************************
  // **** CAPTURA DE LOS ELEMENTOS DEL SUBMENU CLICKEABLE, ES EL LI
  var submenu_user = $('#click-submenu-user');
  var submenu_res = $('#click-submenu-res');
  var submenu_profile = $('#click-submenu-profile');
  var submenu_migrant = $('#click-submenu-migrant');

  // FUNCION PARA MOSTRAR EL SUBMENU AL DAR CLICK SOBRE EL MISMO
  function ToggleSubMenu(submenu){
    submenu.toggle('slow');
  }

  // EVENTO PARA EL SUBMENU CLICK AL DE USUARIOS
  submenu_user.click(function(){ToggleSubMenu($('#ul-user'));});
  submenu_res.click(function(){ToggleSubMenu($('#ul-res'));});
  submenu_profile.click(function(){ToggleSubMenu($('#ul-profile'));});
  submenu_migrant.click(function(){ToggleSubMenu($('#ul-migrant'));});
  // ***************************************************************************

  // ***************************************************************************
  // ************** CAPTURA DEL ELENMETO
  var iframe = $('iframe'); // CAPTURA DEL IFRAME
  var btn_new = $('#btn-new');
  var btn_edit = $('#btn-edit');
  var btn_home = $('#btn-home');
  var btn_cancel = $('#btn-cancel');
  var btn_consult_reservation = $('#btn-consult-reservation');
  var btn_edit_profile = $('#btn-profile');
  var btn_consult_migrant = $('#btn-migrant');
  var btn_new_res = $('#btn-new-res');
  var btn_about = $('#btn-about');

  // FUNCION PARA ABRIR EL SUBMENU DENTRO DEL IFRAME
  function ShowIframe(src){
    // SI LA PAGINA ESTA ABIERTA NO HAGAS NADA
    if(iframe.attr('src') == src){}
    // SI LA PAGINA AUN NO ESTA ABIERTA ABRELA
    else{iframe.attr('src', src);iframe.hide();iframe.fadeIn();}
  }

  // EVENTOS CLICK PARA ABRIR EL IFRAME
  btn_new.click(function(){ShowIframe("new.php");});
  btn_edit.click(function(){ShowIframe("edit.php");});
  btn_consult_migrant.click(function(){ShowIframe("migrant.php");});
  btn_edit_profile.click(function(){ShowIframe("edit-profile.php?id="+user);});
  btn_consult_reservation.click(function(){ShowIframe("reservation.php");});
  btn_new_res.click(function(){ShowIframe("_reservation.php");});
  btn_home.click(function(){ShowIframe("consulado.php");});
  btn_about.click(function(){ShowIframe("about.php");});
  // ***************************************************************************

  // ***************************************************************************
  // PROGRAMACION PARA HACER EL MENU RETRAIBLE
  var contador = 0;
  var btn_menu = $("#menu");
  btn_menu.click(function(){
      if(contador == 0){
        $('aside').animate({
          width: '5%'
        }, 'slow');
        $('section').animate({
          width: '95%'
        }, 'slow');
        $('.text').hide();
        $('.icon').animate({
          padding: '0',
          width: '45%'
        }, 'slow');
        $('.icon').css("margin", "auto");
        $('#line').animate({
          marginTop: '41px'
        }, 'slow');
        $('.container-button').animate({
          paddingTop: '40%'
        }, 'slow');
        $("#user").animate({
          width: '45%'
        }, 'slow');
        contador = 1;
      }
      else if(contador == 1){
        $('section').animate({
          width: '84%'
        }, 'slow');
        $('aside').animate({
          width: '16%'
        }, 'slow');
        $('.text').show();
        $('.icon').animate({
          paddingRight: '13px',
          width: '18%'
        }, 'slow');
        $('.icon').css("margin", "unset");
        $('#line').animate({
          marginTop: '0px'
        }, 'slow');
        $('.container-button').animate({
          paddingTop: '7%'
        }, 'slow');
        $("#user").animate({
          width: '39%'
        }, 'slow');
        contador = 0;
      }
  });
});
