<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MIS SCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
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
                <label for="">Contraseña</label>
                <img src="img/lock.png" alt="" class="icon">
                <input type="password" placeholder="Contraseña" class="textbox" name="contrasena1" value="<?php echo $reg['Clave']?>" required autocomplete="off">
              </div>
              <div class="field line">
                <label for="">Telefono</label>
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="000-000-0000" class="textbox" name="telefono" value="<?php echo $reg['Telefono']?>" required autocomplete="off">
              </div>
              <div class="field" id="field-button">
                <input type="button" id="btn-cancel" value="Cancelar">
                <input type="submit" name=""  class="button-save" value="Guardar">
              </div>
          <?php
            }
          ?>
        </form>
      </div>
    </div>
  </body>
</html>
