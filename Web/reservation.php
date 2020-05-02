<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/reservation.css">
    <!-- MIS SCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
    <title>Reservaciones</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img" id="aling-left">
        <input type="text" name="search" placeholder="Search.." id="search-res" autocomplete="off">
      </div>
      <div class="container-table" style="overflow-x:auto;">
        <table id="table-res">
            <thead>
              <tr>
                <th style="color: #00FF80;">Fecha de inicio</th>
                <th style="color: #EC6D4A;">Fecha de conclusión</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>10 de Julio del 2020</td>
                <td>1 de Enero del 2020</td>
                <td><a href="#" class="button edit">Editar</a></td>
                <td><a href="#" class="button task-delete delete">Eliminar</a></td>
              </tr>
              <tr>
                <td>10 de Julio del 2020</td>
                <td>11 de Julio del 2020</td>
                <td><a href="#" class="button edit">Editar</a></td>
                <td><a href="#" class="button task-delete delete">Eliminar</a></td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </body>
  <script src="js/app.js"></script> <!--Manda a llamar al json-->
</html>
