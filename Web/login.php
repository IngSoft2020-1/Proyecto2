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
    <!-- ESTA LIBRERIA LA CREO: EDUARDO BLANCO
        PARA PODER MANDAR A LLAMAR UN MENSAJE
        DE VALIDACION
    -->
    <script src="js/msg-alert.js"></script>
    <link rel="stylesheet" href="css/msg-alert.css">
    <!-- FIN DE LA LIBRERIA -->
    <!-- MY STYLES -->
    <link rel="stylesheet" href="css/login.css">
    <title>Titulo</title>
  </head>
  <body>
    <div id="container-login">
      <div class="container-white">
        <div class="container">
          <div class="container-logo">
            <img src="img/logo.jpg" class="logo">
          </div>
          <!--Llama a check.php para ver si existe el usuario-->
          <form action="check.php" method="post">
            <div class="field">
              <div class="background-black">
                <img src="img/name.png" alt="" class="icon">
              </div>
              <div class="background-gray">
                <input type="text" placeholder="Correo" class="textbox" name="usuario" id="txt-email" autocomplete="off">
              </div>
            </div>
            <div class="field">
              <div class="background-black">
                <img src="img/lock.png" alt="" class="icon">
              </div>
              <div class="background-gray">
                <input type="password" placeholder="•••••••••" class="textbox" name="clave" autocomplete="off">
              </div>

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
