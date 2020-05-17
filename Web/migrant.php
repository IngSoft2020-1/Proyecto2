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
          <select class="" name="order">
            <option value=""></option>
            <option value="">Fecha de llegada asc</option>
            <option value="">Fecha de llegada desc</option>
            <option value="">Nombre asc</option>
            <option value="">Nombre desc</option>
            <option value="">Cita consulado asc</option>
            <option value="">Cita consulado desc</option>
          </select>
        </div>
        <div class="select">
          <label for="show">Mostrar:</label>
          <select class="" name="show">
            <option value=""></option>
            <option value="">Último mes</option>
            <option value="">Últimos 3 meses</option>
            <option value="">Últimos 6 meses</option>
            <option value="">Todos</option>
          </select>
        </div>
      </div>
      <div class="container-table" style="overflow-x:auto;">
        <table id="table-migrants">
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
                <th></th>
              </tr>
            </thead>
            <tbody id="tasks-migrants">
              <tr class="tr">
                <td style="display: none;">1</td>
                <td class="min-width"><input class="min-width-txt" type="text" name="" value="05-12-2020"></td>
                <td><input type="text" name="" value="Juan Jose Ricarda"></td>
                <td class="min-width"><input class="min-width-txt" type="text" name="" value="05-12-2020"></td>
                <td class="min-width"><input class="min-width-txt" type="text" name="" value="09:00 am"></td>
                <td class="min-width"><input class="min-width-txt" type="text" name="" value="10:00 am"></td>
                <td><input type="text" name="" value="Hondureño"></td>
                <td><input type="text" name="" value="664-123-1234"></td>
                <td class="container-menu menu">
                  <div class="options menu-1">
                    <div class="option">
                      <p class="text-menu edit-1">Editar</p>
                    </div>
                    <div class="option">
                      <p class="text-menu">Eliminar</p>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <script src="js/app.js"></script> <!--Manda a llamar al json-->
</html>
