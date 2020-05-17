<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/migrant.css">
    <title>Editar</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img" id="aling-left">
        <input type="text" name="search" placeholder="Search.." id="search-edit" autocomplete="off">
      </div>
      <div class="container-select">
        <div class="select">
          <label for="order">Ordenar por:</label>
          <select class="" name="order">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
          </select>
        </div>
        <div class="select">
          <label for="show">Mostrar:</label>
          <select class="" name="show">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
          </select>
        </div>
      </div>
      <div class="container-table" style="overflow-x:auto;">
        <table id="table-edit">
            <thead>
              <tr>
                <th style="color: #00FF80;">Nombre</th>
                <th style="color: #00FF80;">Correo</th>
                <th style="color: #EC6D4A;">Telefono</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tasks"></tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
</html>
