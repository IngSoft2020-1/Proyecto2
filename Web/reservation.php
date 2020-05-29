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
                <th style="color: #00FF80;">Fecha de reservación</th>
                <th style="color: #EC6D4A;">Nombre</th>
                <th style="color: #EC6D4A;">Días</th>
                <th style="color: #EC6D4A;">Tipo habitación</th>
                <th style="color: #00FF80;"># Habitación</th>
                <th style="color: #00FF80;">Costo</th>
                <th style="color: #EC6D4A;">Estado</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
            <tbody id="tasksReservacion"></tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <script src="js/app-reservation.js"></script> <!--Manda a llamar al json-->
</html>
