<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/migrant.css">

    <!-- LIBRERIAS PARA DATEPICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <!-- LIBRERIA PARA LOS POPUPS
    -->
    <script src="js/popup.js"></script>
    <link rel="stylesheet" href="css/popup.css">
    <!-- FIN DE LA LIBRERIA -->
    <title>Editar</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img" id="aling-left">
        <div class="container-a">
          <a href="addManualMigrant.php"><img src="img/plus.png" alt="" class="icon-plus"></a>
          <a href="addManualMigrant.php">Agregar manualmente</a>
          <button type="button" name="button">Actualizar lista</button>
          <select class="" name="">
            <option value="">Seleccion personalizada</option>
            <option value="">Todos los de la pantalla</option>
          </select>
          <button type="button" name="button">Exportar</button>
        </div>
        <input type="text" name="search" placeholder="Search.." id="search-migrants" autocomplete="off">
      </div>
      <div class="container-select">
        <div class="select">
          <label for="order">Ordenar por:</label>
          <select class="" name="order" id="mySelect">
            <option value="0" selected>Seleccionar</option>
            <option value="1">Fecha de llegada asc</option>
            <option value="2">Fecha de llegada desc</option>
            <option value="3">Nombre asc</option>
            <option value="4">Nombre desc</option>
       <!-- <option value="5">Cita consulado asc</option>
            <option value="6">Cita consulado desc</option> -->
          </select>
        </div>
        <div class="select">
          <label for="show">Mostrar:</label>
          <select class="" name="show" id="mySelect2">
            <option value="">Proximos 7 días</option>
            <option value="mes">Último mes</option>
            <option value="meses3">Últimos 3 meses</option>
            <option value="meses6">Últimos 6 meses</option>
            <option value="Todos">Todos</option>
          </select>
        </div>
      </div>
      <div class="container-table" style="overflow-x:auto;">
          <table id="table-migrants" class="tablesorter">
            <thead>
              <tr>
                <th style="display: none;">ID</th>
                <th style="color: #00FF80;">Fecha de llegada</th>
                <th style="color: #00FF80;">Nombre</th>
                <th style="color: #00FF80;">Fecha de nacimiento</th>
                <th style="color: #EC6D4A;">Hora de llegada</th>
                <th style="color: #EC6D4A;">Cita consulado</th>
                <th style="color: #EC6D4A;">Nacionalidad</th>
                <th style="color: #EC6D4A;">Teléfono</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tasks-migrants"></tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <div class="box" id="success">
    <p class="title-box"></p>
    <button id="btn-cancel-2" class="btn-cancel" name="button">Cancelar</button>
    <button class="btn-confirm" name="button">Aceptar</button>
  </div>
  <script src="js/consult-migrant.js"></script> <!--Manda a llamar al json-->
  <!-- HORA -->
  <script type="text/javascript" src="js/hora/src/wickedpicker.js"></script>
  <link rel="stylesheet" href="js/hora/stylesheets/wickedpicker.css">
  <script src="js/migrant.js"></script>
  <script>
  $("#search-migrants").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table-migrants tbody").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
  </script>

</html>
