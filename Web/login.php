<!-- Login -->
<?php
      session_start();
      error_reporting(0);

      if($_SESSION['error'] == '1'){
        echo "<script>alert('Datos incorrectos.');</script>";
      }
      $_SESSION['error'] = '0';
    ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- VIEWPORT ES LA PANTALLA DEL CELULAR-->
    <!-- EN CONTENT LOS ESTILOS SE ADAPTAN AL ANCHO DEL DISPOSITVO -->
    <!-- USER SCALABLE EVITA QUE SE HAGA ZOOM -->
    <meta name="viewport" content="width=device-width, user-scalable=no">
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
              <input type="text" placeholder="Correo" class="textbox" name="usuario" required>
            </div>
            <div class="field line">
              <img src="img/lock.png" alt="" class="icon">
              <input type="password" placeholder="•••••••••" class="textbox" name="clave" required>
            </div>
            <div class="field">
              <input type="submit" value="Iniciar" id="button-start">
            </div>
          </form>
        </div>
      </div>
      <!-- SI SE ABRE EN CELULAR CARGARA ESTE DIV -->
      <div class="mobile" style="display: none;">
        <div class="container">
          <img src="img/user_cel.png" alt="" id="logo">
          <p class="text">Bienvenido</p>
        </div>
        <div class="container" id="container-form">
          <form action="check.php" method="post">
            <div class="field line">
              <img src="img/name.png" alt="" class="icon">
              <input type="text" placeholder="Correo" class="textbox" name="usuario" required>
            </div>
            <div class="field line">
              <img src="img/lock.png" alt="" class="icon">
              <input type="password" placeholder="•••••••••" class="textbox" name="clave" required>
            </div>
            <div class="field">
              <input type="submit" value="Iniciar" id="button-start">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
