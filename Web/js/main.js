$(document).ready(function(){
  // CAPTURA DEL ELENMETO
  var btn_new = $('#btn-new');
  var btn_edit = $('#btn-edit');
  var btn_home = $('#btn-home');
  var btn_cancel = $('#btn-cancel');
  var btn_consult_reservation = $('#btn-consult-reservation');

  var submenu_user = $('#click-submenu-user');
  var submenu_res = $('#click-submenu-res');

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

  btn_cancel.click(function(){
    $(location).attr('href', "edit.php");
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
});
