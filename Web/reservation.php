<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <script type="text/javascript" src="js/reservation.js"></script>
    <script type="text/javascript" src="js/submenu.js"></script>
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
        <input type="text" name="search" placeholder="Search.." id="search-res" autocomplete="off">
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
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
            <tbody id="tasksReservacion">
              <tr>
                <td style="display: none;">1</td>
                <td><input type="text" value="10/10/2020" class="datepicker fecha-llegada habilitar"></td>
                <td class="td-name">Jose Jose Valezuela</td>
                <td>
                  <select class="habilitar">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                  </select>
                </td>
                <td>
                  <select class="habilitar">
                    <option value="">Sencilla</option>
                    <option value="">Doble</option>
                    <option value="">Triple</option>
                    <option value="">Otra</option>
                  </select>
                </td>
                <td><input type="number" class="habilitar number" value="1"></td>
                <td><input type="number" class="habilitar number" value="320"></td>
                <td>En espera</td>
                <td class="td-right">
                  <div class="evento">
                    <img src="img/points.png" class="icon">
                  </div>
                  <div class="sub-menu sub-menu-1">
                    <input type="button" name="" value="Iniciar">
                    <input type="button" name="" value="Editar huespedes">
                    <input type="button" name="" value="Eliminar">
                  </div>
                </td>
              </tr>
              <tr>
                <td style="display: none;">2</td>
                <td><input type="text" value="10/10/2020" class="datepicker fecha-llegada habilitar"></td>
                <td class="td-name">Jose Jose Valezuela</td>
                <td>
                  <select class="habilitar">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                  </select>
                </td>
                <td>
                  <select class="habilitar">
                    <option value="">Sencilla</option>
                    <option value="">Doble</option>
                    <option value="">Triple</option>
                    <option value="">Otra</option>
                  </select>
                </td>
                <td><input type="number" class="habilitar number" value="1"></td>
                <td><input type="number" class="habilitar number" value="320"></td>
                <td>En espera</td>
                <td class="td-right">
                  <div class="evento">
                    <img src="img/points.png" class="icon">
                  </div>
                  <div class="sub-menu sub-menu-2">
                    <input type="button" name="" value="Iniciar">
                    <input type="button" name="" value="Editar huespedes">
                    <input type="button" name="" value="Eliminar">
                  </div>
                </td>
              </tr>
              <tr>
                <td style="display: none;">3</td>
                <td><input type="text" value="10/10/2020" class="datepicker fecha-llegada habilitar"></td>
                <td class="td-name">Jose Jose Valezuela</td>
                <td>
                  <select class="habilitar">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                  </select>
                </td>
                <td>
                  <select class="habilitar">
                    <option value="">Sencilla</option>
                    <option value="">Doble</option>
                    <option value="">Triple</option>
                    <option value="">Otra</option>
                  </select>
                </td>
                <td><input type="number" class="habilitar number" value="1"></td>
                <td><input type="number" class="habilitar number" value="320"></td>
                <td>En espera</td>
                <td class="td-right">
                  <div class="evento">
                    <img src="img/points.png" class="icon">
                  </div>
                  <div class="sub-menu sub-menu-3">
                    <input type="button" name="" value="Iniciar">
                    <input type="button" name="" value="Editar huespedes">
                    <input type="button" name="" value="Eliminar">
                  </div>
                </td>
              </tr>
            </tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <script src="js/app-reservation.js"></script> <!--Manda a llamar al json-->
</html>
