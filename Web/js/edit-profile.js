$(document).ready(function(){
  // CAPTURA DEL ELENMETO
  var btn_new = $('#btn-new');
  var btn_edit = $('#btn-edit');
  var btn_home = $('#btn-home');
  var btn_cancel = $('#btn-cancel');
  var btn_consult_reservation = $('#btn-consult-reservation');
  var btn_edit_profile = $('#btn-profile');

  var submenu_user = $('#click-submenu-user');
  var submenu_res = $('#click-submenu-res');
  var submenu_profile = $('#click-submenu-profile');

  // estos dos son uno solo
  var btn_new_res = $('#btn-new-res');

  // estos dos son uno solo
  var btn_new_user = $('#btn-new-user');
  var btn_text_1 = $('#text-1');

  var iframe = $('iframe');
  var container_home = $('#container-home');

  // EVENTO PARA EL SUBMENU CLICK AL DE USUARIOS
  submenu_user.click(function(){
    $('#ul-user').toggle("slow");
  });

  submenu_res.click(function(){
    $('#ul-res').toggle("slow");
  });

  submenu_profile.click(function(){
    $('#ul-profile').toggle("slow");
  });

  // EVENTO CLICK
  btn_new.click(function(){
    // VARIABLES
    let newHTML = "new.php";
    // OCULTAR ELEMENTOS
    $(container_home).hide();
    // SI YA ESTA ABIERTO ESE SUBMENU SOLO SE MUESTRA PARA QUE NO SE CREE UNO NUEVO
    if($(iframe).attr("src") == "new.php"){
      $(iframe).show(); // SE MUESTRA ESE SUBMENU
    }
    else{
      // SI EL SUBMENU AUN NO ESTA ABIERTO EL IFRAME TOMA EL VALOR DEL NEW HTML QUE SE DESEA ABRIR
      $(iframe).attr("src", newHTML);
      $(iframe).show(); // SE MUESTRA EL IFRAME CON EL NUEVO CONTENIDO
    }
  });

  btn_home.click(function(){
    $(container_home).show();
    $(iframe).hide();
  });

  btn_edit.click(function(){
    // VARIABLES
    let newHTML = "edit.php";
    // OCULTAR ELEMENTOS
    $(container_home).hide();
    // SI YA ESTA ABIERTO ESE SUBMENU SOLO SE MUESTRA PARA QUE NO SE CREE UNO NUEVO
    if($(iframe).attr("src") == "edit.php"){
      $(iframe).show(); // SE MUESTRA ESE SUBMENU
    }
    else{
      // SI EL SUBMENU AUN NO ESTA ABIERTO EL IFRAME TOMA EL VALOR DEL NEW HTML QUE SE DESEA ABRIR
      $(iframe).attr("src", newHTML);
      $(iframe).show(); // SE MUESTRA EL IFRAME CON EL NUEVO CONTENIDO
    }
  });

  btn_edit_profile.click(function(){
    // VARIABLES
    let newHTML = "edit-profile.php";
    // OCULTAR ELEMENTOS
    $(container_home).hide();
    // SI YA ESTA ABIERTO ESE SUBMENU SOLO SE MUESTRA PARA QUE NO SE CREE UNO NUEVO
    if($(iframe).attr("src") == "edit-profile.php"){
      $(iframe).show(); // SE MUESTRA ESE SUBMENU
    }
    else{
      // SI EL SUBMENU AUN NO ESTA ABIERTO EL IFRAME TOMA EL VALOR DEL NEW HTML QUE SE DESEA ABRIR
      $(iframe).attr("src", newHTML);
      $(iframe).show(); // SE MUESTRA EL IFRAME CON EL NUEVO CONTENIDO
    }
  });

  // *******************************************************************
  // *******************************************************************
  // *******************************************************************
  // *******************************************************************
  // *******************************************************************
  // *******************************************************************
  // *******************************************************************
  // *******************************************************************
  // *******************************************************************

  btn_cancel.click(function(){
    $(iframe).hide();
    alert("entro");
  });

  btn_consult_reservation.click(function(){
    // VARIABLES
    let newHTML = "reservation.php";
    // OCULTAR ELEMENTOS
    $(container_home).hide();
    // SI YA ESTA ABIERTO ESE SUBMENU SOLO SE MUESTRA PARA QUE NO SE CREE UNO NUEVO
    if($(iframe).attr("src") == "reservation.php"){
      $(iframe).show(); // SE MUESTRA ESE SUBMENU
    }
    else{
      $(iframe).show(); // SE MUESTRA EL IFRAME CON EL NUEVO CONTENIDO
      // SI EL SUBMENU AUN NO ESTA ABIERTO EL IFRAME TOMA EL VALOR DEL NEW HTML QUE SE DESEA ABRIR
      $(iframe).attr("src", newHTML);

    }
  });

  btn_new_res.click(function(){
    // VARIABLES
    let newHTML = "_reservation.php";
    // OCULTAR ELEMENTOS
    $(container_home).hide();
    // SI YA ESTA ABIERTO ESE SUBMENU SOLO SE MUESTRA PARA QUE NO SE CREE UNO NUEVO
    if($(iframe).attr("src") == "_reservation.php"){
      $(iframe).show(); // SE MUESTRA ESE SUBMENU
    }
    else{
      $(iframe).show(); // SE MUESTRA EL IFRAME CON EL NUEVO CONTENIDO
      $(iframe).attr("src", newHTML);// SI EL SUBMENU AUN NO ESTA ABIERTO EL IFRAME TOMA EL VALOR DEL NEW HTML QUE SE DESEA ABRIR
    }
  });


  btn_new_user.click(function(){
    $('table tbody').append("<tr>"+
    "<td><input type='text' name='' value=''></td>"+
    "<td><input type='tel' name='' value=''></td>"+
    "<td><input type='text' name='' value='' id='datepicker'></td>"+
    "<td><input type='number' name='' value=''></td>"+
    "<td><input type='text' name='' value=''></td>"+
    "<td><a class='button task-delete delete'>Eliminar</a></td>"+
      "</tr>"
    );
  });

  btn_text_1.click(function(){
    $('table tbody').append("<tr>"+
    "<td><input type='text' name='' value=''></td>"+
    "<td><input type='tel' name='' value=''></td>"+
    "<td><input type='text' name='' value='' id='datepicker'></td>"+
    "<td><input type='number' name='' value=''></td>"+
    "<td><input type='text' name='' value=''></td>"+
    "<td><a class='button task-delete delete'>Eliminar</a></td>"+
      "</tr>"
    );
  });

  // CODIGO PARA EL DATEPICKER
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

  $( function() {
    $( "#datepicker2" ).datepicker();
  } );

  var contador = 0;
  // PROGRAMACION PARA HACER EL MENU RETRAIBLE
  var btn_menu = $("#menu");
  btn_menu.click(function(){
      // $('aside').css("width", "5%");
      // $('header').css("width", "95%");
      // $('section').css("width", "95%");
      // $('.text').css("display", "none");
      // $('.icon').css("padding", "0px").css("width", "45%").css("margin","auto");
      // $('#line').css("margin-top", "41px");
      // $('.container-button').css("padding-top", "40%");
      // $("#user").css("width", "45%");

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
        $("iframe").animate({
          width: '90%'
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
        $("iframe").animate({
          width: '75%'
        }, 'slow');
        contador = 0;
      }
  });

    var count_mobile = 0;
    var menu_mobile = $("#menu-mobile");
    $(menu_mobile).click(function(){
      // $("#menu-mobile").css("margin-left", "275px");
      // $("aside").css("display", "block").css("position", "absolute").css("width", "74%");

      if(count_mobile == 0){
        $("#menu-mobile").animate({
          marginLeft: '275px',
        }, 'slow');
        $("#menu-mobile").css("position", "relative");

        $("aside").css("display", "block").css("position", "absolute");
        $("aside").animate({
          width: '74%'
        }, 'slow');
        count_mobile = 1;
      }
      else if(count_mobile == 1){
        $("#menu-mobile").animate({
          marginLeft: '0px'
        }, 'slow');

        $("aside").animate({
          width: '0%'
        }, 'slow');
        $("aside").css("display", "none");
        count_mobile = 0;
      }
    });
});
