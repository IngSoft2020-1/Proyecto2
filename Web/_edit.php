<?php
  $conexion=mysqli_connect("localhost","root","","derechoscopio")
  or die("Problemas con la conexión");
  
  $usu = $_GET['var'];

  session_start();
  error_reporting(0);

  if($_SESSION['datos'] == '1'){
    echo "<script>
    localStorage.setItem('datosBien', 1);
    </script>";
  }
  else if($_SESSION['datos'] == '0'){
    echo "<script>
    localStorage.setItem('datosMal', 1);
    </script>";
  }
  if($_SESSION['contra'] == '1'){
    echo "<script>
    localStorage.setItem('contraBien', 1);
    </script>";
  }
  else if($_SESSION['contra'] == '0'){
    echo "<script>
    localStorage.setItem('contraMal', 1);
    </script>";
  }
  $_SESSION['datos'] = '';
  $_SESSION['contra'] = '';
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
    
    <!-- SCRIPTS -->
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
      <form action="update-user-general.php?id=<?php echo $usu?>" method="post">

          <?php
            /*CONSULTA PARA CARGAR DATOS A TEXTBOX*/
            $query= "SELECT Nombre, Apellidos, Correo, Telefono FROM usuario WHERE ID='$usu'";
            
            $registros = mysqli_query($conexion, $query) or
            die("Problemas en el select:" . mysqli_error($conexion));
          if ($reg = mysqli_fetch_array($registros))
          {
            ?>
            <!-- NOMBRE -->
            <div class="field line">
              <label for="">Nombres</label>
              <div class="info">
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="Nombre" class="textbox" name="nombres" value="<?php echo $reg['Nombre']?>" autocomplete="off">
              </div>
              <!-- IMPRESION DE ERRORES -->
              <?php
                if($_SESSION['validNombres'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">No se permiten espacios en blanco.</p>
                  </div>';
                } else if($_SESSION['validNombres'] == '2')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">Demasiado largo, debe ser menor a 100.</p>
                  </div>';
                } else if($_SESSION['validNombres'] == '3')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">El formato del nombre no es correcto.</p>
                  </div>';
                }
              ?>
            </div>
            
            <!-- APELLIDOS -->
            <div class="field line">
              <label for="">Apellidos</label>
              <div class="info">
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="Apellidos" class="textbox" name="apellidos" value="<?php echo $reg['Apellidos']?>" autocomplete="off">
              </div>
              <!-- IMPRESION DE ERRORES -->
              <?php
                if($_SESSION['validApellidos'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">No se permiten espacios en blanco.</p>
                  </div>';
                } else if($_SESSION['validApellidos'] == '2')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">Demasiado largo, debe ser menor a 60.</p>
                  </div>';
                } else if($_SESSION['validApellidos'] == '3')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">El formato de apellidos no es correcto.</p>
                  </div>';
                }
              ?>
            </div>

            <!-- CORREO 1 -->
            <div class="field line">
              <label for="">Correo</label>
              <div class="info">
                <img src="img/mail.png" alt="" class="icon">
                <input type="text" placeholder="Correo" class="textbox" name="correo1" value="<?php echo $reg['Correo']?>" autocomplete="off">
              </div>
              <!-- IMPRESION DE ERRORES -->
              <?php
                if($_SESSION['validCorreo'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">No se permiten espacios en blanco.</p>
                  </div>';
                } else if($_SESSION['validCorreo'] == '2')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">Demasiado largo, debe ser menor a 100.</p>
                  </div>';
                } else if($_SESSION['validCorreo'] == '3')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">El formato del correo no es correcto.</p>
                  </div>';
                } else if($_SESSION['validCorreo'] == '4')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">Ese correo ya esta en uso.</p>
                  </div>';
                }
              ?>
            </div>

            <!-- CORREO 2 -->
            <div class="field line">
              <label for="">Confirmar Correo</label>
              <div class="info">
                <img src="img/mail.png" alt="" class="icon">
                <input type="text" placeholder="Confirmar" class="textbox" name="correo2" value="<?php echo $reg['Correo']?>" autocomplete="off">
              </div>
              <!-- IMPRESION DE ERRORES -->
              <?php
                if($_SESSION['validCorreo'] == '5')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">El correo no se parece.</p>
                  </div>';
                }
              ?>
            </div>

            <!-- TELEFONO -->
            <div class="field line">
              <label for="">Telefono</label>
              <div class="info">
                <img src="img/name.png" alt="" class="icon">
                <input type="text" placeholder="000-000-0000" class="textbox"  name="telefono" value="<?php echo $reg['Telefono']?>" autocomplete="off" id="txt-tel">
              </div>
              <!-- IMPRESION DE ERRORES -->
              <?php
                if($_SESSION['validTelefono'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">El telefono debe tener un formato de 000-000-0000.</p>
                  </div>';
                }
                $_SESSION['validNombres'] = '';
                $_SESSION['validApelllidos'] = '';
                $_SESSION['validCorreo'] = '';
                $_SESSION['validTelefono'] = '';
              ?>
            </div>

            <!-- CONTRASEÑA -->
              <div class="field">
                <label for="">Contraseña</label>
                <button type="button" name="button" id="btn-change">Cambiar</button>
              </div>
              <div class="field" id="field-button">
              <div id="container">
            </div>
                <input type="button" id="btn-cancel" value="Cancelar">
                <input type="button" name=""  class="button-save" value="Guardar" id="btn-save"> <!-- disabled -->
              </div>
              <?php
            }
          ?>
          
          <!-- POPUP CONFIRMACION DE CAMBIOS DE DATOS GENERALES -->
          <div class="popup" id="popup-confirmar" title="Confirmar" style="display: none;">
              <label class="lbl-pass">¿Está seguro que desea guardar los cambios?</label>
              <div class="container-button-save-cancel">
                <input type="button" name="" value="Cancelar" id="button-cancel3" class="btn">
                <form>
                  <input type="submit" name="" value="Aceptar" class="btn" id="button-save-3">
                </form>
              </div>
          </div>
        </form>

        <!-- POPUP CAMBIAR CONTRASEÑA -->
        <div class="popup" id="popup-contrasena" title="Nueva contraseña" style="display: none;">
          <form action="update-user-contra.php?id=<?php echo $usu?>" method="post" class="form-popup">
            <!--  <label class="lbl-pass">Contraseña actual</label>
            <input type="text" name="" value="" class="txt"> -->
            <label class="lbl-pass">Nueva contraseña</label>
            <input type="text" name="contra1" value="" class="txt">
            <label class="lbl-pass">Confirmar</label>
            <input type="text" name="contra2" value="" class="txt">
            <div class="container-button-save-cancel">
              <input type="button" name="" value="Cancelar" id="button-cancel" class="btn">
              <input type="submit" name="" value="Guardar" class="btn" id="button-save-2">
            </div>
          </form>
        </div>
        
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
    
    <!-- MENSAJE DATOS GENERALES BIEN -->
    <div class="box" id="datosBien">
      <p class="title-box">Se han modificado los datos.</p>
    </div>
    <!-- MENSAJE DATOS GENERALES MAL -->
    <div class="box" id="datosMal">
      <p class="title-box">Error en los campos.</p>
    </div>
    <!-- MENSAJE CONTRASEÑA BIEN -->
    <div class="box" id="contraBien">
      <p class="title-box">Contraseña cambiada con exito.</p>
    </div>
    <!-- MENSAJE CONTRASEÑA MAL -->
    <div class="box" id="contraMal">
      <p class="title-box">La cotraseña tiene que tener minimo cuatro caracteres, una letra y un número.</p>
    </div>
  </body>
</html>
