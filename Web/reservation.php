<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <script type="text/javascript" src="js/reservation.js"></script>
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
        <div class="container-a">
          <a href=""><img src="img/plus.png" alt="" class="icon-plus"></a>
          <a href="">Agregar manualmente</a>
        </div>
        <input type="text" name="search" placeholder="Search.." id="search-res" autocomplete="off">
      </div>
      <div class="container-select">
        <div class="select">
          <label for="order">Ordenar por:</label>
          <select class="" name="order">
            <option value="1">Fecha reservacion asc</option>
            <option value="2" selected>Fecha reservacion desc</option>
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
            <tbody>
              <tr id="1">
                <td><input disabled="on" type="text" value="10/10/2020" class="fecha-llegada habilitar"></td>
                <td class="td-name">
                  <div class="container-td">
                    <div>
                      <select class="habilitar">
                        <option value="">Jose Jose</option>
                        <option value="">Ramon Ayala</option>
                        <option value="">Chalino Sachez</option>
                        <option value="">Jose Juanga</option>
                      </select>
                    </div>
                    <div class="td-cont">
                      <img src="img/trash.png" alt="" class="icon">
                      <img src="img/new.png" alt="" class="icon">
                    </div>
                  </div>
                </td>
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
                <td><p id="estado-1" class="parrafo">En espera</p></td>
                <td class="td-right">
                  <div class="evento  evento-1">
                    <img src="img/points.png" class="icon">
                  </div>
                  <div class="sub-menu sub-menu-1">
                    <input class="input-submenu btn-start" type="button" name="" value="Iniciar">
                    <input class="input-submenu btn-edit" type="button" name="" value="Editar huespedes">
                    <input style="display: none;" class="input-submenu btn-cancel" type="button" name="" value="Cancelar">
                    <input class="input-submenu btn-delete" type="button" name="" value="Eliminar">
                  </div>
                </td>
              </tr>

              <tr id="2">
                <td><input disabled="on" type="text" value="10/11/2020" class="fecha-llegada habilitar"></td>
                <td class="td-name">
                  <div class="container-td">
                    <div>
                      <select class="habilitar">
                        <option value="">Hernesto</option>
                        <option value="">Peralta</option>
                        <option value="">Josue</option>
                        <option value="">Jose Juanga</option>
                      </select>
                    </div>
                    <div class="td-cont">
                      <img src="img/trash.png" alt="" class="icon">
                      <img src="img/new.png" alt="" class="icon">
                    </div>
                  </div>
                </td>
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
                <td><input type="number" class="habilitar number" value="10"></td>
                <td><input type="number" class="habilitar number" value="500"></td>
                <td><p id="estado-2" class="parrafo">En espera</p></td>
                <td class="td-right">
                  <div class="evento  evento-2">
                    <img src="img/points.png" class="icon">
                  </div>
                  <div class="sub-menu sub-menu-2">
                    <input class="input-submenu btn-start" type="button" name="" value="Iniciar">
                    <input class="input-submenu btn-edit" type="button" name="" value="Editar huespedes">
                    <input style="display: none;" class="input-submenu btn-cancel" type="button" name="" value="Cancelar">
                    <input class="input-submenu btn-delete" type="button" name="" value="Eliminar">
                  </div>
                </td>
              </tr>
              <tr id="3">
                <td><input disabled="on" type="text" value="10/12/2020" class="fecha-llegada habilitar"></td>
                <td class="td-name">
                  <div class="container-td">
                    <div>
                      <select class="habilitar">
                        <option value="">Laila</option>
                        <option value="">Vianey</option>
                        <option value="">Sergio</option>
                        <option value="">Jose Juanga</option>
                      </select>
                    </div>
                    <div class="td-cont">
                      <img src="img/trash.png" alt="" class="icon">
                      <img src="img/new.png" alt="" class="icon">
                    </div>
                  </div>
                </td>
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
                <td><input type="number" class="habilitar number" value="12"></td>
                <td><input type="number" class="habilitar number" value="220"></td>
                <td><p id="estado-3" class="parrafo">En espera</p></td>
                <td class="td-right">
                  <div class="evento  evento-3">
                    <img src="img/points.png" class="icon">
                  </div>
                  <div class="sub-menu sub-menu-3">
                    <input class="input-submenu btn-start" type="button" name="" value="Iniciar">
                    <input class="input-submenu btn-edit" type="button" name="" value="Editar huespedes">
                    <input style="display: none;" class="input-submenu btn-cancel" type="button" name="" value="Cancelar">
                    <input class="input-submenu btn-delete" type="button" name="" value="Eliminar">
                  </div>
                </td>
              </tr>
            </tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <!-- <script src="js/app-reservation.js"></script>  -->
</html>
