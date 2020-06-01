<?php 
  session_start();
  $varsesion = $_SESSION['cual'];
	if($varsesion == null || $varsesion == '')
	{
    header("location:logout.php"); /*Te redirecciona a la pagina de admin*/
    die();
  }

  $idUser = $_SESSION['cual'];
?>

<!--Menu de la pagina-->
<!--Llamado de Login-->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/inicio.css">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MIS SCRIPT -->
    <script type="text/javascript">var user = "<?= $idUser ?>";</script>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- METADATOS PARA APP MOVIL -->
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Inicio</title>
  </head>
  <body>
    <!-- <div class="container-logo">
      <img src="img/logo.jpg" class="logo">
    </div> -->
    <!-- CONTENEDOR DE LA BARRA LATERAL -->
    <aside>
      <div class="user">
        <img src="img/user.png" alt="" id="user">
        <p class="text">Jose Jose</p>
        <span id="line"></span>
      </div>
      <ul class="menu nav">
        <li class="container-button" id="btn-home">
          <img src="img/home-white.png" alt="" class="icon">
          <a class="text" href="">Inicio</a>
        </li>
        <li class="container-button display" id="click-submenu-user">
          <div class="div-display">
            <img src="img/users.png" alt="" class="icon">
            <a class="text">Usuarios</a>
          </div>
          <ul class="ul-submenu" id="ul-user">
            <li class="container-button submenu" id="btn-new">
              <img src="img/new.png" alt="" class="icon">
              <a class="text">Nuevo</a>
            </li>
            <li class="container-button submenu" id="btn-edit">
              <img src="img/read.png" alt="" class="icon">
              <a class="text">Consultar</a>
            </li>
          </ul>
        </li>
        <li class="container-button display" id="click-submenu-res">
          <div class="div-display">
            <img src="img/bed.png" alt="" class="icon">
            <a class="text">Reservación</a>
          </div>
          <ul class="ul-submenu" id="ul-res">
            <li class="container-button submenu" id="btn-new-res">
              <img src="img/new.png" alt="" class="icon">
              <a class="text">Crear</a>
            </li>
            <li class="container-button submenu" id="btn-consult-reservation">
              <img src="img/read.png" alt="" class="icon">
              <a class="text">Consultar</a>
            </li>
          </ul>
        </li>
        <li class="container-button display" id="click-submenu-profile">
          <div class="div-display">
            <img src="img/profile.png" alt="" class="icon">
            <a class="text">Perfil</a>
          </div>
          <ul class="ul-submenu" id="ul-profile">
            <li class="container-button submenu" id="btn-profile">
              <img src="img/edit.png" alt="" class="icon">
              <a class="text">Editar</a>
            </li>
          </ul>
        </li>
        <li class="container-button display" id="click-submenu-migrant">
          <div class="div-display">
            <img src="img/migrant.png" alt="" class="icon">
            <a class="text">Migrantes</a>
          </div>
          <ul class="ul-submenu" id="ul-migrant">
            <li class="container-button submenu" id="btn-migrant">
              <img src="img/read.png" alt="" class="icon">
              <a class="text">Consultar</a>
            </li>
          </ul>
        </li>
      </ul>
    </aside>

    <!-- CONTENEDOR PRINCIPAL DE LA PANTALLA -->
    <section>
      <!-- ENCABEZADO -->
      <header>
        <div id="header">
          <div class="container">
            <img src="img/menu.png" id="menu" alt="">
            <img src="img/menu.png" id="menu-mobile" alt="">
            <p id="title"></p>
          </div>
          <div class="container" id="header-2">
            <a id="title" href="logout.php">Cerrar sesión</a>
            <img src="img/user.png" id="menu-header" alt="">
          </div>
        </div>
      </header>
      <div class="container-section">
        <div id="container-home">
          <table class="table-mobile">
            <tbody>
              <tr class="blue">
                <td colspan="2" class="name">Jose Vazquez</td>
              </tr>
              <tr class="black">
                <td class="txtBlue">Telefono</td>
                <td>664646</td>
              </tr>
              <tr class="gray">
                <td class="txtBlue">Fecha</td>
                <td>02-12-2020</td>
              </tr>
              <tr class="black">
                <td class="txtBlue">Fecha 2</td>
                <td>02-12-2020</td>
              </tr>
              <tr>
                <td class="space">&nbsp;</td>
              </tr>
              <tr class="blue">
                <td colspan="2" class="name">Jose Vazquez</td>
              </tr>
              <tr class="black">
                <td class="txtBlue">Telefono</td>
                <td>664646</td>
              </tr>
              <tr class="gray">
                <td class="txtBlue">Fecha</td>
                <td>02-12-2020</td>
              </tr>
              <tr class="black">
                <td class="txtBlue">Fecha 2</td>
                <td>02-12-2020</td>
              </tr>
              <tr>
                <td class="space">&nbsp;</td>
              </tr>
              <tr class="blue">
                <td colspan="2" class="name">Jose Vazquez</td>
              </tr>
              <tr class="black">
                <td class="txtBlue">Telefono</td>
                <td>664646</td>
              </tr>
              <tr class="gray">
                <td class="txtBlue">Fecha</td>
                <td>02-12-2020</td>
              </tr>
              <tr class="black">
                <td class="txtBlue">Fecha 2</td>
                <td>02-12-2020</td>
              </tr>
              <tr>
                <td class="space">&nbsp;</td>
              </tr>
            </tbody>
          </table>
        </div>
        <iframe scrolling="yes"></iframe>
      </div>
    </section>
  </body>
</html>
