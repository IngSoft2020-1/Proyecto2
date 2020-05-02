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
                <th style="color: #EC6D4A;">Días</th>
                <th style="color: #00FF80;">Estado</th>
                <th style="color: #EC6D4A;">Nombre</th>
                <th style="color: #00FF80;">Teléfono</th>
                <th style="color: #EC6D4A;">Edad</th>
                <th style="color: #00FF80;">Nacionalidad</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>10 de Julio del 2020</td>
                <td>3</td>
                <td>En Espera</td>
                <td>Eduardo Morgado Jacome <br> Abner Perales <br> Jesús Ramirez </td>
                <td>664-123-1231 <br> 664-123-1231 <br> 664-123-1231 </td>
                <td>20 <br> 21 <br> 22 </td>
                <td> Brasileño <br> Veracruzano <br> Ecuatoriano </td>
                <td><a href="#" class="button edit">Editar</a></td>
                <td><a href="#" class="button task-delete delete">Eliminar</a></td>
              </tr>
              <tr>
                <td>10 de Julio del 2020</td>
                <td>4</td>
                <td>En Progreso</td>
                <td>Eduardo Castro <br> Jesus Perales <br> Edy Ramirez </td>
                <td>664-123-1231 <br> 664-123-1231 <br> 664-123-1231 </td>
                <td>20 <br> 21 <br> 22 </td>
                <td> Brasileño <br> Veracruzano <br> Ecuatoriano </td>
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
