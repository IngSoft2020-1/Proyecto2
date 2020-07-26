<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="js/time.js"></script>
    <link rel="stylesheet" href="css/time.css">
    <link rel="stylesheet" href="css/consulado.css">
     <!-- LIBRERIA PARA LOS POPUPS -->
     <script src="js/popup.js"></script>
    <link rel="stylesheet" href="css/popup.css">
    <!-- FIN DE LA LIBRERIA -->
    <script src="js/consulado-pop.js"></script>
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="date">
        <p id="date" class="time"></p>
          <div class="text">
            <p class="time title">Fecha consulado</p>
            <p id="hour" class="time"></p>
          </div>
      </div>
      <div class="container-table">
        <table>
          <thead>
            <tr>
              <th style="color: #00FF80;">Día de salida</th>
              <th style="color: #00FF80;">Hora cita</th>
              <th style="color: #EC6D4A;">Nombre</th>
              <th style="color: #EC6D4A;" class="habitacion"># Habitación</th>
            </tr>
          </thead>
            <!-- <tr>
              <td>12 de Enero</td>
              <td>9:00 AM</td>
              <td>Juan Jose Benito Camelo</td>
              <td class="habitacion">7</td>
            </tr> -->
            <tbody id="tasks-consulado"></tbody>
        </table>
      </div>
      <div class="container-tools">
      <div class="text">
          <p class="time title">Costos</p>
        </div>
      </div>
      <div class="container-table">
        <table id="table-price">
          <thead>
            <tr>
              <th style="color: #00FF80;"># Personas</th>
              <th style="color: #00FF80;">Tipo habitación</th>
              <th style="color: #00FF80;">Cobro</th>
              <th style="color: #00FF80;" class="habitacion">Precio</th>
              <th style="color: #00FF80;">% descuento</th>
              <th style="color: #EC6D4A;">Subtotal</th>
              <th style="color: #EC6D4A;" class="habitacion">Impuesto 13%</th>
              <th style="color: #EC6D4A;" class="habitacion">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2</td>
              <td>Sencilla</td>
              <td>Sencillo</td>
              <td>
                <div class="flex">
                <p class="p">$</p><input disabled type="number" value="1035.40" class="hab input-price">
                </div>
              </td>
              <td>
                <div class="flex">
                <p class="p">$</p><input disabled type="number" value="-235.40" class="hab input-desc">
                </div>
              </td>
              <td>$740.00</td>
              <td>$96</td>
              <td>$836.65</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="derecha">
        <input type="button" id="editar-costos" value="Editar">
        <form>
        <input type="button" id="save" value="Guardar" style="display: none;">
        <input type="button" id="cancel" value="Cancelar" style="display: none;">
        </form> 
      </div>
    </div>
  </body>
  <div class="box" id="sure">
        <p class="title-box" style="display: inline;"></p>
        <button id="btn-cancel-2" class="btn-cancel" name="button">Cancelar</button>
    </div>
  <script src="js/consulado.js"></script>
</html>
