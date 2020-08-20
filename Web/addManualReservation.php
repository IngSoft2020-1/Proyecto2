<?php
  session_start();
  error_reporting(0);
  $_SESSION['prueba12'] = '0';
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- <script src="js/migrant.js"></script> -->
    <!-- <link rel="stylesheet" href="css/edit.css"> -->
    <link rel="stylesheet" href="css/migrant.css">
    <link rel="stylesheet" href="css/new.css">
    <link rel="stylesheet" href="css/addReservation.css">
    <!-- ESTA LIBRERIA LA CREO: EDUARDO BLANCO
        PARA PODER MANDAR A LLAMAR UN MENSAJE
        DE VALIDACION -->
    <script src="js/msg-alert.js"></script>
    <link rel="stylesheet" href="css/msg-alert.css">
    <link rel="stylesheet" href="css/addMigrantManual.css">
    <!-- FIN DE LA LIBRERIA -->

    <!-- LIBRERIA PARA LOS POPUPS -->
    <script src="js/popup.js"></script>
    <link rel="stylesheet" href="css/popup.css">
    <!-- FIN DE LA LIBRERIA -->

    <script src="js/addManualReservation.js"></script>
    <!-- LIBRERIAS PARA DATEPICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <title></title>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/new-reservation.js"></script>
    <link rel="stylesheet" href="css/edit.css">
  </head>
  <body>
    <div class="container" style="color: white; text-align:center !important;">
      <!--- <h1>Crear reservaci&oacute;n manualmente</h1> -->
      <img src="img/guest.png" alt="" class="icon" style="width: 350px !important; height: 200px !important;">
    </div>

    <div class="container">
      <form action="new-reservation.php" method="post" style="width: 80% !important;">
        <!-- aun no funciona new-reservation -->
        <div class="field line">
          <label for="">Fecha de reservaci&oacute;n</label>
          <div class="info">
            <img src="img/calendar.png" alt="" class="icon">
            <input type="text" value="Presiona aquí..." class="datepicker fecha-llegada habilitar ocultar" name="fechaLlegada">
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                  echo '<div class="container-msg">
                    <p class="title-msg">Sin especificar.</p>
                    <p class="title-content-msg">Seleccione una fecha en el calendario.</p>
                  </div>';
              ?>
        </div>





        <div class="field line">
          <label for="">Personas sin reservaci&oacute;n</label>
          <div class="info">
            <img src="img/name.png" alt="" class="icon" >
            <select class="habilitar ignorar pais ocultar " name="nacionalidad">
            <option value="UNO" selected>Persona 1</option>
              <option value="DOS">Persona 2</option>
            </select>
              <input type="button" class="button-cancel" value="Agregar" id="btn-cancel7" style="margin-left: 10px !important;">
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
          echo '<div class="container-msg">
            <p class="title-msg">Sin opción.</p>
            <p class="title-content-msg">No hay personas para asignar a reservaciones.</p>
          </div>';
              ?>
        </div>
        <br>


        <div class="field line">
          <label for="">Noches</label>
          <div class="info">
            <img src="img/bed2.png" alt="" class="icon" >
            <select class="habilitar ignorar pais ocultar " name="nacionalidad">
            <option value="UNO" selected>1</option>
              <option value="DOS">2</option>
              <option value="TRES">3</option>
              <option value="CUATRO">4</option>
              <option value="CINCO">5</option>
            </select>
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                if($_SESSION['validNacion'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Sin especificar.</p>
                    <p class="title-content-msg">Seleccione una opción de la lista.</p>
                  </div>';
                }
                else if($_SESSION['validNacion'] == '2')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!.</p>
                    <p class="title-content-msg">Seleccione una opción de la lista.</p>
                  </div>';
                }
              ?>
        </div>


        <div class="field line">
          <label for="">Personas en la  reservaci&oacute;n</label>
          <div class="info">
            <img src="img/name.png" alt="" class="icon" >
            <select class="habilitar ignorar pais ocultar " name="nacionalidad">
            <option value="UNO" selected>Persona 1</option>
              <option value="DOS">Persona 2</option>
            </select>
              <input type="button" class="button-cancel" value="Eliminar" id="btn-cancel9" style="margin-left: 10px !important;">
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                  echo '<div class="container-msg">
                    <p class="title-msg">Reservación vacía.</p>
                    <p class="title-content-msg">La reservación debe tener al menos una persona.</p>
                  </div>';
              ?>
        </div>
        <br>

        <div class="field line">
          <label for="">Tipo de habitaci&oacute;n</label>
          <div class="info">
            <img src="img/bed2.png" alt="" class="icon" >
            <select class="habilitar ignorar pais ocultar " name="nacionalidad">
            <option value="UNO" selected>Habitacion</option>
            </select>
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                if($_SESSION['validNacion'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Sin especificar.</p>
                    <p class="title-content-msg">Seleccione una opción de la lista.</p>
                  </div>';
                }
                else if($_SESSION['validNacion'] == '2')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!.</p>
                    <p class="title-content-msg">Seleccione una opción de la lista.</p>
                  </div>';
                }
              ?>
        </div>
        <br>


      <!-- MAPEO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                $_SESSION['validNombres'] = '0';
                $_SESSION['validApelllidos'] = '0';
                $_SESSION['validTelefono'] = '0';
                $_SESSION['validNacion'] = '0';
                $_SESSION["validCita"]='0';
                $_SESSION['validHoraLlegada']='0';
                $_SESSION['validFechaLlegada']='0';
                $_SESSION['validNacimiento']='0';
              ?>
        </div>
        <div class="field max">
          <div class="contenedor-centrado" >
            <input type="button" class="button-cancel" value="Cancel" id="btn-cancel">
            <input type="submit" name="" class="save" value="Guardar">
          </div>
        </div>
      </form>
    </div>
    <?php
      if($_SESSION['sePudo'] == '0')
      {
    ?>
        <!-- LIBRERIA PARA IMPRIMIR MENSAJE -->
        <div class="box" style="display: flex;">
          <p class="title-box">Ocurrio un error.</p>
        </div>
    <?php
      }
    ?>
    <?php
      if($_SESSION['sePudo'] == '1')
      {
    ?>
        <!-- LIBRERIA PARA IMPRIMIR MENSAJE -->
        <div class="box" style="display: flex;">
          <p class="title-box">Persona ya existente.</p>
        </div>
    <?php
      }
    ?>
    <?php
      if($_SESSION['sePudo'] == '2')
      {
    ?>
        <!-- LIBRERIA PARA IMPRIMIR MENSAJE -->
        <div class="box" style="display: flex;">
          <p class="title-box">Persona registrada exitosamente.</p>
        </div>
    <?php
      }
      $_SESSION['sePudo'] = '';
    ?>
    <div class="box" id="sure">
        <p class="title-box" id="popup12" style="display: inline;"></p>
        <button id="btn-cancel-2" class="btn-cancel" name="button">No</button>
    </div>
  </body>
</html>
