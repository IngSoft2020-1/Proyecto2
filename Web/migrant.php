<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/migrant.css">
    <script src="js/migrant.js"></script>
    <title>Editar</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img" id="aling-left">
        <input type="text" name="search" placeholder="Search.." id="search-migrants" autocomplete="off">
      </div>
      <div class="container-select">
        <div class="select">
          <label for="order">Ordenar por:</label>
          <select class="" name="order" id="mySelect">
          <!-- <option value="1">Fecha de llegada asc</option>
            <option value="2">Fecha de llegada desc</option> -->
            <option value="0" selected>Seleccionar</option>
            <option value="3">Nombre asc</option>
            <option value="4">Nombre desc</option>
       <!-- <option value="5">Cita consulado asc</option>
            <option value="6">Cita consulado desc</option> -->
          </select>
        </div>
        <div class="select">
          <!-- <label for="show">Mostrar:</label>
          <select class="" name="show" id="mySelect2">
            <option value="mes">Último mes</option>
            <option value="meses3">Últimos 3 meses</option>
            <option value="meses6">Últimos 6 meses</option>
            <option value="Todos">Todos</option>
          </select> -->
        </div>
      </div>
      <div class="container-table" style="overflow-x:auto;">
        <table id="table-migrants" class="tablesorter">
            <thead>
              <tr>
                <td style="display: none;">ID</td>
                <th style="color: #00FF80;">Fecha de llegada</th>
                <th style="color: #00FF80;">Nombre</th>
                <th style="color: #00FF80;">Fecha de nacimiento</th>
                <th style="color: #EC6D4A;">Hora de llegada</th>
                <th style="color: #EC6D4A;">Cita consulado</th>
                <th style="color: #EC6D4A;">Nacionalidad</th>
                <th style="color: #EC6D4A;">Teléfono</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tasks-migrants"></tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <script src="js/consult-migrant.js"></script> <!--Manda a llamar al json-->
</html>
