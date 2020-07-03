<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <!-- LIBRERIAS PARA DATEPICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/migrant.css">
    <link rel="stylesheet" href="css/reservation.css">
    <!-- MIS SCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
    <title>Reservaciones</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img" id="aling-left">
        <div class="container-a">
          <a href=""><img src="img/plus.png" alt="" class="icon-plus"></a>
          <a href="">Agregar manualmente</a>
        </div>
        <input type="text" name="search" placeholder="Search.." id="search-res" autocomplete="off">
      </div>
      <div class="container-select">
        <div class="select">
          <label for="order">Ordenar por:</label>
          <select class="" name="order">
            <option value="1">Fecha reservacion asc</option>
            <option value="2" selected>Fecha reservacion desc</option>
            <option value="3">Estado asc</option>
            <option value="4">Estado desc</option>
          </select>
        </div>
      </div>
      <div class="container-table" style="overflow-x:auto;">
        <table id="table-res">
            <thead>
              <tr>
                <th style="display: none;">ID</th>
                <th style="color: #00FF80;">Fecha de reservación</th>
                <th style="color: #EC6D4A;">Nombre</th>
                <th style="color: #EC6D4A;">Días</th>
                <th style="color: #EC6D4A;">Tipo habitación</th>
                <th style="color: #00FF80;"># Habitación</th>
                <th style="color: #00FF80;">Costo</th>
                <th style="color: #EC6D4A;">Estado</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tasksReservacion"></tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <script src="js/app-reservation.js"></script>
  <script type="text/javascript" src="js/reservation.js"></script>
</html>
