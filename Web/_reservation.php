<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/reservation.css">
    <!-- MIS SCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
    <!-- LIBRERIAS PARA DATEPICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Reservaciones</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img-1">
        <div class="container-1">
          <p class="text">Día de llegada</p>
          <input type="text" name="" value="" class="textbox-1" id="datepicker">
        </div>
        <div class="container-1">
          <p class="text">Días en estadía</p>
          <input type="number" name="" value="" class="textbox-1">
        </div>
        <div class="container-2">
          <img src="img/plus.png" alt="" class="icon-title-1" id="btn-new-user">
          <p id="text-1">Nuevo</p>
        </div>
      </div>
      <div class="container-table" style="overflow-x:auto;">
        <table>
            <thead>
              <tr>
                <th style="color: #00FF80;">Nombre</th>
                <th style="color: #00FF80;">Teléfono</th>
                <th style="color: #00FF80;">Fecha Nacimiento</th>
                <th style="color: #00FF80;">Edad</th>
                <th style="color: #00FF80;">Nacionalidad</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type='text' name='' value=''></td>
                <td><input type='tel' name='' value=''></td>
                <td><input type="text" name="" value="" id="datepicker"></td>
                <td><input type='number' name='' value=''></td>
                <td><input type='text' name='' value=''></td>
                <td><a class='button task-delete delete'>Eliminar</a></td>
              </tr>
            </tbody> <!-- Aqui ocurre la magia en js -->
          </table>
          <div class="field" id="field-button">
            <input type="button" class="button-cancel" value="Cancel">
            <input type="submit" name=""  class="button-save" value="Guardar">
          </div>
      </div>
    </div>
  </body>
</html>
