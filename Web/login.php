<!-- Login -->


<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- VIEWPORT ES LA PANTALLA DEL CELULAR-->
    <!-- EN CONTENT LOS ESTILOS SE ADAPTAN AL ANCHO DEL DISPOSITVO -->
    <!-- USER SCALABLE EVITA QUE SE HAGA ZOOM -->
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MIS SCRIPTS -->
    <!-- <script type="text/javascript" src="js/login.js"></script> -->
    <!-- MY STYLES -->
    <link rel="stylesheet" href="css/login.css">
    <title>Titulo</title>
  </head>
  <body>
    <div id="container-login">
      <div class="container-white">
        <div class="container">
          <img src="img/logo.png" alt="" id="logo">
        </div>
        <div class="container">
          <!--Llama a check.php para ver si existe el usuario-->
          <form action="check.php" method="post">
            <div class="field line">
              <img src="img/name.png" alt="" class="icon">
              <input type="text" placeholder="Correo" class="textbox" name="usuario" required id="txt-email">
            </div>
            <div class="field line">
              <img src="img/lock.png" alt="" class="icon">
              <input type="password" placeholder="•••••••••" class="textbox" name="clave" required>
            </div>
            <div class="field">
              <input type="submit" value="Iniciar" id="button-start">
            </div>
          </form>
          <p id="msj" style="display: none;">* Datos incorrectos</p>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
      session_start();
      error_reporting(0);

      if($_SESSION['error'] == '1'){
        // echo "<script>alert('Datos incorrectos.');</script>";
        echo "
        <script type='text/javascript'>

        var msj = $('#msj');
        msj.css('display', 'block');
        console.log(msj);

        </script>
        ";
      }
      $_SESSION['error'] = '0';
    ?>
