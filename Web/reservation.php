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
  <!-- LIBRERIA PARA LOS POPUPS
    -->
  <script src="js/popup.js"></script>
  <link rel="stylesheet" href="css/popup.css">
  <!-- FIN DE LA LIBRERIA -->
  <!-- MIS SCRIPT -->
  <script type="text/javascript" src="js/main.js"></script>
  <title>Reservaciones</title>
</head>

<body>
  <div class="container">
    <div class="container-img" id="aling-left">
      <div class="container-a">
        <a href=""><img src="img/plus.png" alt="" class="icon-plus"></a>
        <a href="addManualReservation.php">Agregar manualmente</a>
      </div>
      <input type="text" name="search" placeholder="Search.." id="search-res" autocomplete="off">
    </div>
    <div class="container-select">
      <div class="select">
        <label for="order">Ordenar por:</label>
        <select class="" name="order" id="mySelect">
          <option value="1" selected>Fecha reservacion asc</option>
          <option value="2">Fecha reservacion desc</option>
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
        <tbody id="tasksReservacion"></tbody>
        <!--Donde se hace la magia con json-->
      </table>
      <p id="null" style="display: none;">No hay reservaciones disponibles</p>
    </div>
  </div>
  <div class="box" id="success" style="position: fixed !important;">
    <p class="title-box" style="display: inline;"></p>
    <button id="btn-cancel-pop" class="btn-cancel-pop" name="button">Cancelar</button>
  </div>
  <div class="box-delete" id="deletePop" style="position: fixed !important;">
    <p class="title-box-delete" style="display: inline;"></p>
    <button id="btn-cancel-delete" class="btn-cancel-delete" name="button">Cancelar</button>
    <button class="btn-confirm-delete">Aceptar</button>
  </div>
</body>
<script src="js/app-reservation.js"></script>
<div class="caja-migrantes" style="display: none;">
  <div class="sub-caja">
    <table id="table-migrant">
      <thead>
        <tr>
          <th style="color: #EC6D4A;">Fecha de llegada</th>
          <th style="color: #00FF80;">Nombre</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr id="count-1">
          <td>01-02-2020</td>
          <td>
            <p class="name-mig">Jose Miguel Velazquez</p>
          </td>
          <td><input type="button" value="Agregar" class="btn-add-migrant"></td>
        </tr>
        <tr id="count-2">
          <td>01-02-2020</td>
          <td>
            <p class="name-mig">Jose Miguel</p>
          </td>
          <td><input type="button" value="Agregar" class="btn-add-migrant"></td>
        </tr>
        <tr id="count-3">
          <td>01-02-2020</td>
          <td>
            <p class="name-mig">Pepe Aguilar</p>
          </td>
          <td><input type="button" value="Agregar" class="btn-add-migrant"></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="sub-caja">

    <input type="button" name="" id="btn-cancel-migrant" value="Cancelar">
  </div>
</div>

</html>
