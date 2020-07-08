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
    <!-- <script src="js/ajaxOrdenar.js"></script> -->
    <title>Editar</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img" id="aling-left">
        <div class="container-a">
          <a href="addManualMigrant.php"><img src="img/plus.png" alt="" class="icon-plus"></a>
          <a href="addManualMigrant.php">Agregar manualmente</a>
          <!-- ACTUALIZAR MIGRANTES -->
          <form action="leer.php" method="POST" enctype="multipart/form-data" style="justify-content: center !important; ">
            <p><label id="lblFile" for="txtFile">Buscar archivo</label></p>
            <p><input id="txtFile" type="file" name="txtFile" accept=".xlsx"></p>
            <p><input id="lblRefresh" type="submit" name="subida" value="Actualizar lista"></p>
          </form>
          <!-- DESCARGAR PDF MIGRANTES -->
          <form style="width: 150%" action="print-migrantes-pdf.php" method="POST">
            <p><input id="lblExportar" type="button" class="button-export" name="subida" value="Generar PDF"></p>
          </form>
        </div>
        <input type="text" name="search" placeholder="Search.." id="search-migrants" autocomplete="off">
      </div>
      <div class="container-select">
        <div class="select">
          <label for="order">Ordenar por:</label>
          <select class="" name="order" id="mySelect">
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
            <option value="0">Todos</option>
            <option value="7">Proximos 7 días</option>
            <option value="1">Último mes</option>
            <option value="3">Últimos 3 meses</option>
            <option value="3">Últimos 6 meses</option>
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
  <div class="pop2">
    <p class="text">Seleccione un archivo excel</p>
  </div>
  <div class="box" id="success" style="position: fixed !important;">
    <p class="title-box" style="display: inline;"></p>
    <button id="btn-cancel-2" class="btn-cancel" name="button">Cancelar</button>
    <!-- <button class="btn-confirm" name="button">Aceptar</button> -->
  </div>
  <script src="js/consult-migrant.js"></script> <!--Manda a llamar al json-->
  <!-- HORA -->
  <script type="text/javascript" src="js/hora/src/wickedpicker.js"></script>
  <link rel="stylesheet" href="js/hora/stylesheets/wickedpicker.css">
  <script src="js/migrant.js"></script>
</html>
