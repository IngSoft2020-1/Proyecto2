<?php
  session_start();
  error_reporting(0);

  if($_SESSION['listo'] == '1'){
    echo "<script>alert('Cambio registrado exitosamente.');</script>";
  }
  elseif($_SESSION['listo'] == '0'){
    echo "<script>alert('Cambio no registrado.');</script>";
  }

  if($_SESSION['corre'] == '1'){
    echo "<script>alert('Correos no coinciden.');</script>";
    $_SESSION['vall3'] = '1';
  }

  /*
  if($_SESSION['contr'] == '1'){
    echo "<script>alert('Contraseñas no coinciden.');</script>";
    $_SESSION['vall5'] = '1';
  }
  */

  $_SESSION['listo'] = "";
  $_SESSION['contr'] = "";
  $_SESSION['corre'] = "";
?>



<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MIS SCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
    <!-- NO MOVER,  ES PARA EL POPUP -->
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.min.css"/>
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.structure.min.css"/>
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="js/tooltipster-master/dist/css/tooltipster.bundle.min.css" />
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
    <!-- NO MOVER,  ES PARA EL POPUP -->

    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <!-- MIS SCRIPTS -->
    <script type="text/javascript" src="js/edit.js"></script>
    <link rel="stylesheet" href="css/edit.css">
    
    <!-- ESTA LIBRERIA LA CREO: EDUARDO BLANCO
        PARA PODER MANDAR A LLAMAR UN MENSAJE
        DE VALIDACION
    -->
    <script src="js/msg-alert.js"></script>
    <link rel="stylesheet" href="css/msg-alert.css">
    <!-- FIN DE LA LIBRERIA -->

    <title>Editar</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img">
        <img src="img/editar.png" alt="" class="icon-title">
      </div>
      <div class="container-form">
        <?php
          $usu = $_GET['var'];
        ?>
        <form action="edit_usuario.php?var2=<?php echo $usu?>" method="post">
          <?php
            /*Consulta para cargar datos actuales a los textbox*/
            $conexion=mysqli_connect("localhost","root","","derechoscopio") or
              die("Problemas con la conexión");

            $registros = mysqli_query($conexion, "select Nombre, Apellidos, Correo, Telefono from usuario
                                  where ID='$_GET[var]'") or
              die("Problemas en el select:" . mysqli_error($conexion));
            if ($reg = mysqli_fetch_array($registros))
            {
          ?>
              <div class="field line">
                <label for="">Nombre</label>
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="Nombre" class="textbox" name="usuario" value="<?php echo $reg['Nombre']?>" autocomplete="off">

                <?php
                  if($_SESSION['vall1'] == '1')
                  {
                ?>
                    <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                    <div class="container-msg">
                      <p class="title-msg">Titulo de mensaje 1</p>
                      <p class="title-content-msg">Mensaje 1</p>
                    </div>
                    <!-- FIN -->
                <?php
                  }
                ?>
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++AQUI VA LO NUEVO++++++++++++++++++++++++++++++++++++++++++++++++ -->
              </div>
              <div class="field line">
                <label for="">Apellidos</label>
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="Apellidos" class="textbox" name="apellido" value="<?php echo $reg['Apellidos']?>" autocomplete="off">

                <?php
                  if($_SESSION['vall2'] == '1')
                  {
                ?>
                    <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                    <div class="container-msg">
                      <p class="title-msg">Titulo de mensaje 1</p>
                      <p class="title-content-msg">Mensaje 1</p>
                    </div>
                    <!-- FIN -->
                <?php
                  }
                ?>
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++AQUI VA LO NUEVO++++++++++++++++++++++++++++++++++++++++++++++++ -->
              </div>
              <div class="field line">
                <label for="">Correo</label>
                <img src="img/mail.png" alt="" class="icon">
                <input type="text" placeholder="Correo" class="textbox" name="correo1" value="<?php echo $reg['Correo']?>" autocomplete="off">

                <?php
                  if($_SESSION['vall3'] == '1')
                  {
                ?>
                    <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                    <div class="container-msg">
                      <p class="title-msg">Titulo de mensaje 1</p>
                      <p class="title-content-msg">Mensaje 1</p>
                    </div>
                    <!-- FIN -->
                <?php
                  }
                ?>
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++AQUI VA LO NUEVO++++++++++++++++++++++++++++++++++++++++++++++++ -->
              </div>
              <div class="field line">
                <label for="">Confirmar</label>
                <img src="img/mail.png" alt="" class="icon">
                <input type="text" placeholder="Confirmar" class="textbox" name="correo2" value="<?php echo $reg['Correo']?>" autocomplete="off">

                <?php
                  if($_SESSION['vall4'] == '1')
                  {
                ?>
                    <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                    <div class="container-msg">
                      <p class="title-msg">Titulo de mensaje 1</p>
                      <p class="title-content-msg">Mensaje 1</p>
                    </div>
                    <!-- FIN -->
                <?php
                  }
                ?>
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++AQUI VA LO NUEVO++++++++++++++++++++++++++++++++++++++++++++++++ -->
              </div>
              <div class="field line">
                <label for="">Telefono</label>
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="000-000-0000" class="textbox" name="telefono" value="<?php echo $reg['Telefono']?>" autocomplete="off" id="txt-tel">

                <?php
                  if($_SESSION['vall5'] == '1')
                  {
                ?>
                    <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                    <div class="container-msg">
                      <p class="title-msg">Titulo de mensaje 1</p>
                      <p class="title-content-msg">Mensaje 1</p>
                    </div>
                    <!-- FIN -->
                <?php
                  }
                  $_SESSION['vall1'] = '0'; /*Formato nombre*/
                  $_SESSION['vall2'] = '0'; /*Formato Apellidos*/
                  $_SESSION['vall3'] = '0'; /*Formato correo*/
                  $_SESSION['vall4'] = '0'; /*Formato confirmar correo*/
                  $_SESSION['vall5'] = '0'; /*Formato telefono*/
                ?>
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++AQUI VA LO NUEVO++++++++++++++++++++++++++++++++++++++++++++++++ -->
              </div>
              <div class="field">
                <label for="">Contraseña</label>
                <button type="button" name="button" id="btn-change">Cambiar</button>
              </div>
              <div class="field" id="field-button">
                <input type="button" id="btn-cancel" value="Cancelar">
                <form>
                  <input type="submit" name="" class="button-save" value="Guardar" id="btn-save"> <!-- disabled -->
                </form>
              </div>
          <?php
            }
          ?>
          <!-- ESTO MANDA A LLAMAR EL POPUP PERO DESDE JS -->
          <div class="popup" id="popup-contrasena" title="Nueva contraseña" style="display: none;">
            <form class="form-popup"> <!-- ++++++++++++++++++++++++++++++++++++++++++++++++AQUI VA LO NUEVO++++++++++++++++++++++++++++++++++++++++++++++++ -->
              <!--  <label class="lbl-pass">Contraseña actual</label>
              <input type="text" name="" value="" class="txt"> -->
              <label class="lbl-pass">Nueva contraseña</label>
              <input type="text" name="" value="" class="txt">
              <label class="lbl-pass">Confirmar</label>
              <input type="text" name="" value="" class="txt">
              <div class="container-button-save-cancel">
                <input type="button" name="" value="Cancelar" id="button-cancel" class="btn">
                <input type="button" name="" value="Guardar" class="btn" id="button-save-2">
              </div>
            </form>
          </div>
          <!-- Popup de confirmacion para guardar cambios -->
          <!--
          <div class="popup" id="popup-confirmar" title="Confirmar" style="display: none;">
            <form class="form-popup">
              <label class="lbl-pass">¿Está seguro que desea guardar los cambios?</label>
              <div class="container-button-save-cancel">
                <input type="button" name="" value="Cancelar" id="button-cancel3" class="btn">
                <input type="submit" name="" value="Aceptar" class="btn" id="button-save-3">
              </div>
            </form>
          </div>
          -->
        </form>
      </div>
    </div>
  </body>
</html>
