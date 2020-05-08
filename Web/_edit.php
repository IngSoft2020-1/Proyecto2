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

    <!-- MIS SCRIPTS -->
    <script type="text/javascript" src="js/edit.js"></script>
    <link rel="stylesheet" href="css/edit.css">
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
        <form action="edit_usuario.php?var2='<?php echo $usu?>'" method="post">
          <?php
            /*Consulta para cargar datos actuales a los textbox*/
            $conexion=mysqli_connect("localhost","root","","derechoscopio") or
              die("Problemas con la conexión");

            $registros = mysqli_query($conexion, "select Nombre, Apellidos, Correo, Telefono, Clave from usuario
                                  where ID='$_GET[var]'") or
              die("Problemas en el select:" . mysqli_error($conexion));
            if ($reg = mysqli_fetch_array($registros))
            {
          ?>
              <div class="field line">
                <label for="">Nombre</label>
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="Nombre" class="textbox" name="usuario" value="<?php echo $reg['Nombre']?>" required autocomplete="off">
              </div>
              <div class="field line">
                <label for="">Apellidos</label>
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="Apellidos" class="textbox" name="apellido" value="<?php echo $reg['Apellidos']?>" required autocomplete="off">
              </div>
              <div class="field line">
                <label for="">Correo</label>
                <img src="img/mail.png" alt="" class="icon">
                <input type="text" placeholder="Correo" class="textbox" name="correo1" value="<?php echo $reg['Correo']?>" required autocomplete="off">
              </div>
              <div class="field line">
                <label for="">Confirmar</label>
                <img src="img/email.png" alt="" class="icon">
                <!-- ***************** -->
                <!--  ESTE INPUT ERA DE CONTRASEÑA, AHORA ES DE CONFIRMAR CORREO-->
                <!-- ***************** -->
                <input type="text" placeholder="Confirmar" class="textbox" name="contrasena1" value="" required autocomplete="off">
              </div>
              <div class="field line">
                <label for="">Telefono</label>
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="000-000-0000" class="textbox" name="telefono" value="<?php echo $reg['Telefono']?>" required autocomplete="off">
              </div>
              <div class="field">
                <label for="">Contraseña</label>
                <button type="button" name="button" id="btn-change">Cambiar</button>
              </div>
              <div class="field" id="field-button">
                <input type="button" id="btn-cancel" value="Cancelar">
                <input type="submit" name=""  class="button-save" value="Guardar" disabled>
              </div>
          <?php
            }
          ?>
        </form>
        <!-- ESTO MANDA A LLAMAR EL POPUP PERO DESDE JS -->
        <div class="popup" title="Nueva contraseña" style="display: none;">
          <form class="form-popup">
            <label class="lbl-pass">Contraseña actual</label>
            <input type="text" name="" value="" class="txt">
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
      </div>
    </div>
  </body>
</html>
