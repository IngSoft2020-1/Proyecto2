<?php
  session_start();
  error_reporting(0);
  $usu = $_GET['var'];
  
  if($_SESSION['listo'] == '1'){
    echo "<script>
    localStorage.setItem('true', 1);
    </script>";
  }
  else if($_SESSION['listo'] == '0'){
    echo "<script>
    localStorage.setItem('false', 1);
    </script>";
  }
  $_SESSION['listo'] = '';
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    
    <!-- MIS SCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
  
    <!-- LIBRERIA POPUP -->
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.min.css"/>
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.structure.min.css"/>
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="js/tooltipster-master/dist/css/tooltipster.bundle.min.css" />
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
    
    <!-- LIBRERIA POPUPS MENSAJE DE VALIDACION -->
    <script src="js/msg-alert.js"></script>
    <link rel="stylesheet" href="css/msg-alert.css">
    <!-- FIN DE LA LIBRERIA -->

    <!-- LIBRERIA POPUPS MENSAJE -->
    <script src="js/popup.js"></script>
    <link rel="stylesheet" href="css/popup.css">

    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>

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
        <form action="edit_usuario.php?var2=<?php echo $usu?>" method="post">
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
                <div class="info">
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="Nombre" class="textbox" name="usuario" value="<?php echo $reg['Nombre']?>" autocomplete="off">
                </div>
              <?php
                if($_SESSION['vall1'] == '1')
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
                <input type="text" placeholder="Apellidos" class="textbox" name="apellido" value="<?php echo $reg['Apellidos']?>" autocomplete="off">
              </div>
              <?php
                if($_SESSION['vall2'] == '1')
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
                <input type="text" placeholder="Correo" class="textbox" name="correo1" value="<?php echo $reg['Correo']?>" autocomplete="off">
              </div>
              <?php
                if($_SESSION['vall3'] == '1')
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
                <input type="text" placeholder="Confirmar" class="textbox" name="correo2" value="<?php echo $reg['Correo']?>" autocomplete="off">
                </div>
              <?php
                if($_SESSION['vall4'] == '1' || $_SESSION['corre'] == '1')
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
                <label for="">Telefono</label>
                <div class="info">
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="000-000-0000" class="textbox"  name="telefono" value="<?php echo $reg['Telefono']?>" autocomplete="off" id="txt-tel">
                </div>
                <?php
                  if($_SESSION['vall5'] == '1')
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
                ?>
              </div>

              <!-- *********************************************************** -->
              <!-- *********************************************************** -->
              <!-- *********************************************************** -->
              <!-- AQUI ESTA EL POPUP QUE ME PIDIERON DE CAMBIAR CONTRASEÑA -->
              <div class="field">
                <label for="">Contraseña</label>
                <button type="button" name="button" id="btn-change">Cambiar</button>
              </div>





              <!-- <div class="field line">
                <label for="">Contraseña</label>
                <div class="info">
                <img src="img/lock.png" alt="" class="icon">
                <input type="password" placeholder="••••••" class="textbox"  name="contra1" value="<?php // echo $reg['Clave']?>" autocomplete="off">
                </div> -->
                  <?php
                    // if($_SESSION['vall6'] == '1')
                    // {
                  ?>
                      <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
                      <!-- <div class="container-msg">
                        <p class="title-msg">No se puede dejar vacio este campo</p>
                        <p class="title-content-msg">Error en la contraseña</p>
                      </div> -->
                      <!-- FIN -->
                  <?php
                    // }
                  ?>
              <!-- </div> -->

              <!-- <div class="field">
                <label for="">Contraseña</label>
                <button type="button" name="button" id="btn-change">Cambiar</button>
              </div> -->
              <div class="field" id="field-button">
                <input type="button" id="btn-cancel" value="Cancelar">
                <form>
                  <input type="submit" name=""  class="button-save" value="Guardar" id="btn-save"> <!-- disabled -->
                </form>
              </div>
          <?php
            }
          ?>
        </form>
        <!-- ESTO MANDA A LLAMAR EL POPUP PERO DESDE JS -->
        <div class="popup" id="popup-contrasena" title="Nueva contraseña" style="display: none;">
          <form class="form-popup">
            <label class="lbl-pass">Nueva contraseña</label>
            <input type="text" name="contras1" value="" class="txt">
            <label class="lbl-pass">Confirmar</label>
            <input type="text" name="contras2" value="" class="txt">
            <div class="container-button-save-cancel">
              <input type="button" name="" value="Cancelar" id="button-cancel" class="btn">
              <input type="submit" name="" value="Guardar" class="btn" id="button-save-2">
            </div>
          </form>
        </div>
        <!-- Popup de confirmacion para guardar cambios -->
        <!-- <div class="popup" id="popup-confirmar" title="Confirmar" style="display: none;">
          <form class="form-popup">
            <label class="lbl-pass">¿Está seguro que desea guardar los cambios?</label>
            <div class="container-button-save-cancel">
              <input type="button" name="" value="Cancelar" id="button-cancel3" class="btn">
              <input type="button" name="" value="Aceptar" class="btn" id="button-save-3">
            </div>
          </form>
        </div> -->
        <script>
        var txt = $('.textbox');
        var msg = $('.container-msg');
        var i = 0;

        $(txt).click(function(){
          if(i == 0)
          {
            $(msg).toggle(function(){
              $(this).hide();
            });
            i++;
          }
          else if(i == 1){}
        });
        </script>
      </div>
    </div>

    <!-- LIBRERIA PARA IMPRIMIR MENSAJE -->
    <div class="box" id="true">
      <p class="title-box">Cambio registrado</p>
      <!-- <button class="ex" name="button">lala</button> -->
    </div>
    <!-- LIBRERIA PARA IMPRIMIR MENSAJE -->
    <div class="box" id="false">
      <p class="title-box">Cambio no registrado</p>
    </div>
  </body>
</html>
