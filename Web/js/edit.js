$(document).ready(function(){

  $(document).ready(function(){

   //Botón para cambiar contraseña *******************
    var btn_change = $("#btn-change");
    btn_change.click(function(){
      // Aqui cambio las clases de los POPUP
      $("#popup-contrasena").addClass("popup");
      $("#popup-confirmar").removeClass("popup");
      $(".container").css("filter", "blur(4px)");
    });
    // DIALOGO
    $("#btn-change").click(function(){
      $(".popup").dialog();
    });

  //Boton para guardar edicion de usuario **********************
    var btn_save = $("#btn-save");
    btn_save.click(function(){
      // Aqui cambio las clases de los POPUP
      $("#popup-contrasena").removeClass("popup");
      $("#popup-confirmar").addClass("popup");
      $(".container").css("filter", "blur(4px)");
    });
    // DIALOGO
    $("#btn-save").click(function(){
      $(".popup").dialog();
    });

    //Boton para cancelar la edicion del usuario y popup contrasena ***********************************
      var btn_cancel = $("#button-cancel");
      btn_cancel.click(function(){
        $(".container").css("filter", "blur(0px)");
        $( ".popup" ).dialog( "destroy" );
      });

  //Botón para guardar el cambio de contraseña (popup) *************************************
    var btn_save2 = $("#button-save-2");
    btn_save2.click(function(){
      $(".container").css("filter", "blur(0px)");
      $( ".popup" ).dialog( "destroy" );
    });

    //Botón para guardar la edicion del usuario (popup) *************************************
      var btn_save3 = $("#button-save-3");
      btn_save3.click(function(){
        $(".container").css("filter", "blur(0px)");
        $( ".popup" ).dialog( "destroy" );
      });

  //Botón para cancelar popup de confirmacion *****************************************
  var btn_cancel3 = $("#button-cancel3");
  btn_cancel3.click(function(){
    $(".container").css("filter", "blur(0px)");
    $( ".popup" ).dialog( "destroy" );
  });

  //Codigo para lograr el estilo del telefono
    $('#txt-tel').mask('000-000-0000', {placeholder: '000-000-0000'}); //placeholder
  });

  $('#btn-cancel').click(function(){
      // ACTUALIZAR VENTANA PADRE DENTRO DE UN IFRAME
      window.location ='edit.php';
  });

  //$("#popup-confirmar").hasClass("popup")
  //console.log($("#popup-confirmar").hasClass("popup"));


  //Mensaje datos generales cambiados
  var datosbien = localStorage.getItem('datosBien');
  if(datosbien == '1'){
    $('#datosBien').css("display", "flex");
    $('#datosBien').show();
  }
  $('.btn-confirm').click(function(){
    localStorage.setItem('datosBien', 0);
    $('.box').hide();
  });

  //Mensaje error datos generales
  var datosmal = localStorage.getItem('datosMal');
  if(datosmal == '1'){
    $('#datosMal').css("display", "flex");
    $('#datosMal').show();
  }
  $('.btn-confirm').click(function(){
    localStorage.setItem('datosMal', 0);
    $('.box').hide();
  });

  //Mensaje contraseña cambiada
  var contrabien = localStorage.getItem('contraBien');
  if(contrabien == '1'){
    $('#contraBien').css("display", "flex");
    $('#contraBien').show();
  }
  $('.btn-confirm').click(function(){
    localStorage.setItem('contraBien', 0);
    $('.box').hide();
  });

  //Mensaje de error contraseña
  var contramal = localStorage.getItem('contraMal');
  if(contramal == '1'){
    $('#contraMal').css("display", "flex");
    $('#contraMal').show();
  }
  $('.btn-confirm').click(function(){
    localStorage.setItem('contraMal', 0);
    $('.box').hide();
  });

  $('#btn-cancel-2').click(function(){
    $('.box').hide();
  });

});
