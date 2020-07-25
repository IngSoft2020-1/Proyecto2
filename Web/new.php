<?php
  session_start();
  error_reporting(0);

  if($_SESSION['creado'] == '0'){
  }
  else if($_SESSION['creado'] == '1'){
    echo "<script>
    localStorage.setItem('success', 1);
    </script>";
  }
  else if($_SESSION['creado'] == '2'){
    echo "<script>
    localStorage.setItem('UserExist', 1);
    </script>";
  }

  if($_SESSION['corr'] == '1'){
    $_SESSION['val3'] = '1';
  }

  if($_SESSION['contra'] == '1'){
    $_SESSION['val5'] = '1';
  }
  $_SESSION['lucky'];
  $_SESSION['charms'];
  $_SESSION['choco'];
  $_SESSION['krispis'];
  $_SESSION['sucaritas'];
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>

    <link rel="stylesheet" href="css/new.css">
    <!-- ESTA LIBRERIA LA CREO: EDUARDO BLANCO
        PARA PODER MANDAR A LLAMAR UN MENSAJE
        DE VALIDACION
    -->
    <script src="js/msg-alert.js"></script>
    <link rel="stylesheet" href="css/msg-alert.css">
    <!-- FIN DE LA LIBRERIA -->

    <!-- LIBRERIA PARA LOS POPUPS
    -->
    <script src="js/popup.js"></script>
    <link rel="stylesheet" href="css/popup.css">
    <!-- FIN DE LA LIBRERIA -->
    <!-- MIS SCRIPT -->
    <script src="js/new-user.js"></script>
    <script src="js/addUser.js"></script>
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
            <div class="info">
            <img src="img/name.png" alt="" class="icon">
            <?php
              if($_SESSION['lucky'] == '')
              {
            ?>
                <input type="text" placeholder="Nombre" class="textbox" name="nombre" autocomplete="off">
            <?php
              }
              else
              {
            ?>
                <input type="text" placeholder="Nombre" class="textbox" name="nombre"  value="<?php echo $_SESSION['lucky']?>" autocomplete="off">
            <?php
              }
            ?>
          </div>
            <?php
              if($_SESSION['val1'] == '1')
              {
            ?>
                <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                <div class="container-msg">
                  <p class="title-msg">Dato incorrecto</p>
                  <p class="title-content-msg">No se permiten espacios en blanco</p>
                </div>
                <!-- FIN -->
            <?php
              }
            ?>
          </div>
          <div class="field line">
            <label for="">Apellidos</label>
            <div class="info">
              <img src="img/name.png" alt="" class="icon">
              <?php
              if($_SESSION['charms'] == '')
                {
              ?>
                  <input type="text" placeholder="Apellidos" class="textbox" name="apellidos" autocomplete="off">
              <?php
                }
                else
                {
              ?>
                  <input type="text" placeholder="Apellidos" class="textbox" name="apellidos" value="<?php echo $_SESSION['charms']?>" autocomplete="off">
              <?php
                }
              ?>
            </div>

            <?php
              if($_SESSION['val2'] == '1')
              {
            ?>
                <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                <div class="container-msg">
                  <p class="title-msg">Dato incorrecto</p>
                  <p class="title-content-msg">No se permiten espacios en blanco</p>
                </div>
                <!-- FIN -->
            <?php
              }
            ?>
          </div>
          <div class="field line">
            <label for="">Correo</label>
            <div class="info">
            <img src="img/mail.png" alt="" class="icon">
            <?php
              if($_SESSION['krispis'] == '')
                {
              ?>
                  <input type="text" placeholder="Correo" class="textbox" name="correo1" autocomplete="off">
              <?php
                }
                else
                {
              ?>
                  <input type="text" placeholder="Correo" class="textbox" name="correo1" value="<?php echo $_SESSION['krispis']?>" autocomplete="off">
              <?php
                }
              ?>
          </div>

            <?php
              if($_SESSION['val3'] == '1')
              {
            ?>
                <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                <div class="container-msg">
                  <p class="title-msg">Haz coincidir el formato solicitado</p>
                  <p class="title-content-msg">Correo no valido</p>
                </div>
                <!-- FIN -->
            <?php
              }
            ?>
          </div>
          <div class="field line">
            <label for="">Confirmar</label>
            <div class="info">
            <img src="img/mail.png" alt="" class="icon">
            <input type="text" placeholder="Confirmar" class="textbox" name="correo2" autocomplete="off">
          </div>

            <?php
              if($_SESSION['val4'] == '1' || $_SESSION['corr'] == '1')
              {
            ?>
                <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                <div class="container-msg">
                  <p class="title-msg">No coinciden</p>
                  <p class="title-content-msg">Deben coincidir los correos</p>
                </div>
                <!-- FIN -->
            <?php
              }
            ?>
          </div>
          <div class="field line">
            <label for="">Contraseña</label>
            <div class="info">
            <img src="img/lock.png" alt="" class="icon">
            <?php
              if($_SESSION['choco'] == '')
              {
            ?>
                <input type="password" placeholder="Contraseña" class="textbox" name="contrasena1" autocomplete="off">
            <?php
              }
              else
              {
            ?>
                <input type="password" placeholder="Contraseña" class="textbox" name="contrasena1" value="<?php echo $_SESSION['choco']?>" autocomplete="off">
            <?php
              }
            ?>
          </div>

            <?php
              if($_SESSION['val5'] == '1')
              {
            ?>
                <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                <div class="container-msg">
                  <p class="title-msg">Haz coincidir el formato solicitado</p>
                  <p class="title-content-msg">La contraseña debe tener por lo menos 4 digitos</p>
                </div>
                <!-- FIN -->
            <?php
              }
            ?>
          </div>
          <div class="field line">
            <label for="">Confirmar</label>
            <div class="info">
            <img src="img/lock.png" alt="" class="icon">
            <input type="password" placeholder="Confirmar" class="textbox" name="contrasena2" autocomplete="off">
          </div>

            <?php
              if($_SESSION['val6'] == '1' || $_SESSION['contra'] == '1')
              {
            ?>
                <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                <div class="container-msg">
                  <p class="title-msg">No coinciden</p>
                  <p class="title-content-msg">Deben coincidir las contraseñas</p>
                </div>
                <!-- FIN -->
            <?php
              }
            ?>
          </div>
          <div class="field line" style=""> <!-- Telefono -->
            <label for="">Teléfono</label>
            <div class="info">
            <img src="img/phone.png" alt="" class="icon">
            <?php
              if($_SESSION['sucaritas'] == '')
              {
            ?>
                <input type="text" class="textbox" name="telefono" id="txt-tel">
            <?php
              }
              else
              {
            ?>
                <input type="text" class="textbox" name="telefono" value="<?php echo $_SESSION['sucaritas']?>" id="txt-tel">
            <?php
              }
            ?>
          </div>

            <?php
              if($_SESSION['val7'] == '1')
              {
            ?>
                <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                <div class="container-msg">
                  <p class="title-msg">Haz coincidir el formato solicitado</p>
                  <p class="title-content-msg">No se permiten espacios vacios</p>
                </div>
                <!-- FIN -->
            <?php
              }
              $_SESSION['val1'] = '0'; /*Formato nombre*/
              $_SESSION['val2'] = '0'; /*Formato Apellidos*/
              $_SESSION['val3'] = '0'; /*Formato correo*/
              $_SESSION['val4'] = '0'; /*Formato confirmar correo*/
              $_SESSION['val5'] = '0'; /*Formato contrasena*/
              $_SESSION['val6'] = '0'; /*Formato confirmar contrasena*/
              $_SESSION['val7'] = '0'; /*Formato telefono*/
              $_SESSION['creado'] = "";
              $_SESSION['contra'] = "";
              $_SESSION['corr'] = "";
              $_SESSION['lucky'] = '';
              $_SESSION['charms'] = '';
              $_SESSION['choco'] = '';
              $_SESSION['krispis'] = '';
              $_SESSION['sucaritas'] = '';
            ?>
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
    <!-- LIBRERIA PARA IMPRIMIR MENSAJE -->
    <div class="box" id="success">
      <p class="title-box">Usuario creado</p>
    </div>
    <!-- LIBRERIA PARA IMPRIMIR MENSAJE -->
    <div class="box" id="UserExist">
      <p class="title-box">Usuario ya existente</p>
    </div>
    <div class="box" id="sure">
        <p class="title-box" style="display: inline;"></p>
        <button id="btn-cancel-2" class="btn-cancel" name="button">Cancelar</button>
    </div>
  </body>
</html>
