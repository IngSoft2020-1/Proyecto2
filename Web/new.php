<?php
  session_start();
  error_reporting(0);

  if($_SESSION['creado'] == '0'){
    echo "<script>alert('Ocurrio un error.');</script>";
  }
  else if($_SESSION['creado'] == '1'){
  	echo "<script>alert('Usuario registrado.');</script>";
  }
  else if($_SESSION['creado'] == '2'){
  	echo "<script>alert('Usuario ya existente.');</script>";
  }
  $_SESSION['creado'] = "";
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <!-- MIS SCRIPT -->
    <script src="js/new-user.js"></script>
    <link rel="stylesheet" href="css/new.css">
    <!-- ESTA LIBRERIA LA CREO: EDUARDO BLANCO
        PARA PODER MANDAR A LLAMAR UN MENSAJE
        DE VALIDACION
    -->
    <script src="js/msg-alert.js"></script>
    <link rel="stylesheet" href="css/msg-alert.css">
    <!-- FIN DE LA LIBRERIA -->
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="container-img">
        <img src="img/create.png" alt="" class="icon-title">
      </div>
      <div class="container-form">
        <form action="register.php" method="post" autocomplete="off">
          <div class="field line">
            <label for="">Nombre</label>
            <img src="img/name.png" alt="" class="icon">
            <input type="text" placeholder="Nombre" class="textbox" name="usuario" required autocomplete="off">

            <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
            <div class="container-msg">
              <p class="title-msg">Titulo de mensaje 1</p>
              <p class="title-content-msg">Mensaje 1</p>
            </div>
            <!-- FIN -->
          </div>
          <div class="field line">
            <label for="">Apellidos</label>
            <img src="img/name.png" alt="" class="icon">
            <input type="text" placeholder="Apellidos" class="textbox" name="apellido" required autocomplete="off">

            <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
            <div class="container-msg">
              <p class="title-msg">Titulo de mensaje 2</p>
              <p class="title-content-msg">Mensaje 2</p>
            </div>
            <!-- FIN -->
          </div>
          <div class="field line">
            <label for="">Correo</label>
            <img src="img/mail.png" alt="" class="icon">
            <input type="text" placeholder="Correo" class="textbox" name="correo1" required autocomplete="off">

            <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
            <div class="container-msg">
              <p class="title-msg">Titulo de mensaje 3</p>
              <p class="title-content-msg">Mensaje 3</p>
            </div>
            <!-- FIN -->
          </div>
          <div class="field line">
            <label for="">Confirmar</label>
            <img src="img/mail.png" alt="" class="icon">
            <input type="text" placeholder="Confirmar" class="textbox" name="correo2" required autocomplete="off">

            <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
            <div class="container-msg">
              <p class="title-msg">Titulo de mensaje 4</p>
              <p class="title-content-msg">Mensaje 4</p>
            </div>
            <!-- FIN -->
          </div>
          <div class="field line">
            <label for="">Contraseña</label>
            <img src="img/lock.png" alt="" class="icon">
            <input type="password" placeholder="Contraseña" class="textbox" name="contrasena1" required autocomplete="off">

            <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
            <div class="container-msg">
              <p class="title-msg">Titulo de mensaje 5</p>
              <p class="title-content-msg">Mensaje 5</p>
            </div>
            <!-- FIN -->
          </div>
          <div class="field line">
            <label for="">Confirmar</label>
            <img src="img/lock.png" alt="" class="icon">
            <input type="password" placeholder="Confirmar" class="textbox" name="contrasena2" required autocomplete="off">

            <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
            <div class="container-msg">
              <p class="title-msg">Titulo de mensaje 6</p>
              <p class="title-content-msg">Mensaje 6</p>
            </div>
            <!-- FIN -->
          </div>
          <div class="field line" style=""> <!-- Telefono -->
            <label for="">Teléfono</label>
            <img src="img/name.png" alt="" class="icon">
            <input type="text" class="textbox" name="telefono" id="txt-tel">

            <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
            <div class="container-msg">
              <p class="title-msg">Titulo de mensaje 7</p>
              <p class="title-content-msg">Mensaje 7</p>
            </div>
            <!-- FIN -->
          </div>
          <div class="field" id="field-button">
            <div class="container-buttons">
              <input type="button" class="button-cancel" value="Cancel">
              <input type="submit" name=""  class="button-save" value="Guardar">
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
