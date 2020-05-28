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
    <script type="text/javascript" src="js/main.js"></script>
    <title>Inicio</title>
  </head>
  <body>
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
              <img src="img/edit.png" alt="" class="icon">
              <a class="text">Editar</a>
            </li>
          </ul>
        </li>
        <li class="container-button display" id="click-submenu-res">
          <div class="div-display">
            <img src="img/bed.png" alt="" class="icon">
            <a class="text">Reservación</a>
          </div>
          <ul class="ul-submenu" id="ul-res">
            <li class="container-button submenu" id="btn-consult-reservation">
              <img src="img/read.png" alt="" class="icon">
              <a class="text">Consultar</a>
            </li>
            <li class="container-button submenu" id="btn-new-res">
              <img src="img/new.png" alt="" class="icon">
              <a class="text">Crear</a>
            </li>
          </ul>
        </li>
        <li class="container-button">
          <img src="img/profile.png" alt="" class="icon">
          <a class="text" href="">Perfil</a>
        </li>
      </ul>
    </aside>
    <!-- ENCABEZADO -->
    <header>
      <div id="header">
        <div class="container">
          <img src="img/menu.png" id="menu" alt="">
          <p id="title">Nombre Organización</p>
        </div>
        <div class="container" id="header-2">
          <a id="title" href="#">Cerrar sesión</a>
          <img src="img/user.png" id="menu-header" alt="">
        </div>
      </div>

    </header>
    <!-- CONTENEDOR PRINCIPAL DE LA PANTALLA -->
    <section>
      <div id="container-home">
        <h1>HOLA MUNDO</h1>
      </div>
      <iframe scrolling="yes"></iframe>


    </section>
  </body>
</html>
