<?php
  session_start();
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="js/migrant.js"></script>
    <!-- <link rel="stylesheet" href="css/edit.css"> -->
    <link rel="stylesheet" href="css/migrant.css">
    <link rel="stylesheet" href="css/new.css">
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
    
    <script src="js/addMigrantManual.js"></script>
    <!-- LIBRERIAS PARA DATEPICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- MASCARA -->
    <script type="text/javascript" src="js/mask/src/jquery.mask.js"></script>
    <title></title>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/new-migrant.js"></script>
    <link rel="stylesheet" href="css/edit.css">
  </head>
  <body>
    <div class="container">
      <form action="new-migrant.php" method="post">
        <div class="field line">
          <label for="">Nombre</label>
          <div class="info">
            <img src="img/name.png" alt="" class="icon">
            <input type="text" placeholder="Nombre" class="textbox ocultar" name="nombres" autocomplete="off">
          </div>
          <!-- IMPRESION DE ERRORES NOMBRE -->
          <?php
            if($_SESSION['validNombres'] == '1')
            {
              echo '<div class="container-msg">
                <p class="title-msg">Formato Incorrecto!</p>
                <p class="title-content-msg">No se permiten espacios en blanco.</p>
              </div>';
            } else if($_SESSION['validNombres'] == '2')
            {
              echo '<div class="container-msg">
                <p class="title-msg">Formato Incorrecto!</p>
                <p class="title-content-msg">Demasiado largo, debe ser menor a 100.</p>
              </div>';
            } else if($_SESSION['validNombres'] == '3')
            {
              echo '<div class="container-msg">
                <p class="title-msg">Formato Incorrecto!</p>
                <p class="title-content-msg">El formato del nombre no es correcto.</p>
              </div>';
            }
          ?>
        </div>
        <div class="field line">
          <label for="">Apellidos</label>
          <div class="info">
            <img src="img/name.png" alt="" class="icon">
            <input type="text" placeholder="Apellidos" class="textbox ocultar" name="apellidos" autocomplete="off">
          </div>
          <!-- IMPRESION DE ERRORES -->
          <?php
                if($_SESSION['validApelllidos'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">No se permiten espacios en blanco.</p>
                  </div>';
                } else if($_SESSION['validApelllidos'] == '2')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">Demasiado largo, debe ser menor a 60.</p>
                  </div>';
                } else if($_SESSION['validApelllidos'] == '3')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">El formato de apellidos no es correcto.</p>
                  </div>';
                }
              ?>
          <!-- FIN -->
        </div>

        <div class="field line">
          <label for="">Telefono</label>
          <div class="info">
            <img src="img/phone.png" alt="" class="icon">
            <input type="text" value="" class="txt-tel habilitar ocultar" name="telefono" autocomplete="off">
          </div>
          <!-- IMPRESION DE ERRORES -->
          <?php
                if($_SESSION['validTelefono'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto.</p>
                    <p class="title-content-msg">El telefono debe tener un formato de 000-000-0000.</p>
                  </div>';
                }
              ?>
          <!-- FIN -->
        </div>

        <div class="field line">
          <label for="">Nacionalidad</label>
          <div class="info">
            <img src="img/global.png" alt="" class="icon" >
            <select class="habilitar ignorar pais ocultar " name="nacionalidad">
            <option value="" selected></option>
              <option value="ARG">Argentina</option>
              <option value="BLM">San Bartolome</option>
              <option value="BOL">Bolivia</option>
              <option value="BRA">Brasil</option>
              <option value="CHL">Chile</option>
              <option value="COL">Colombia</option>
              <option value="CRI">Cota Rica</option>
              <option value="CUB">Cuba</option>
              <option value="ECU">Ecuador</option>
              <option value="GLP">Guadalupe</option>
              <option value="GTM">Guatemala</option>
              <option value="GUF">Guyana Francesa</option>
              <option value="Mex">Mexico</option>
              <option value="MTQ">Martinica</option>
              <option value="NIC">Nicaragua</option>
              <option value="PAN">Panama</option>
              <option value="PER">Peru</option>
              <option value="PRI">Puerto Rico</option>
              <option value="PRY">Paraguay</option>
              <option value="RDO">Republica Dominicana</option>
              <option value="SLV">El Salvador</option>
              <option value="SXM">San Martin</option>
              <option value="URY">Uruguay</option>
              <option value="VEN">Venezuela</option>
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
          <label for="">Hora cita consulado</label>
          <div class="info">
            <img src="img/date.png" alt="" class="icon">
            <select id="busqueda_hora" class="habilitar hora ocultar" name="citaConsulado">
              <option value="" selected></option>
              <option value="00:00:00">00:00 AM</option>
              <option value="00:15:00">00:15 AM</option>
              <option value="00:30:00">00:30 AM</option>
              <option value="00:45:00">00:45 AM</option>
              <option value="01:00:00">01:00 AM</option>
              <option value="01:15:00">01:15 AM</option>
              <option value="01:30:00">01:30 AM</option>
              <option value="01:45:00">01:45 AM</option>
              <option value="02:00:00">02:00 AM</option>
              <option value="02:15:00">02:15 AM</option>
              <option value="02:30:00">02:30 AM</option>
              <option value="02:45:00">02:45 AM</option>
              <option value="03:00:00">03:00 AM</option>
              <option value="03:15:00">03:15 AM</option>
              <option value="03:30:00">03:30 AM</option>
              <option value="03:45:00">03:45 AM</option>
              <option value="04:00:00">04:00 AM</option>
              <option value="04:15:00">04:15 AM</option>
              <option value="04:30:00">04:30 AM</option>
              <option value="04:45:00">04:45 AM</option>
              <option value="05:00:00">05:00 AM</option>
              <option value="05:15:00">05:15 AM</option>
              <option value="05:30:00">05:30 AM</option>
              <option value="05:45:00">05:45 AM</option>
              <option value="06:00:00">06:00 AM</option>
              <option value="06:15:00">06:15 AM</option>
              <option value="06:30:00">06:30 AM</option>
              <option value="06:45:00">06:45 AM</option>
              <option value="07:00:00">07:00 AM</option>
              <option value="07:15:00">07:15 AM</option>
              <option value="07:30:00">07:30 AM</option>
              <option value="07:45:00">07:45 AM</option>
              <option value="08:00:00">08:00 AM</option>
              <option value="08:15:00">08:15 AM</option>
              <option value="08:30:00">08:30 AM</option>
              <option value="08:45:00">08:45 AM</option>
              <option value="09:00:00">09:00 AM</option>
              <option value="09:15:00">09:15 AM</option>
              <option value="09:30:00">09:30 AM</option>
              <option value="09:45:00">09:45 AM</option>
              <option value="10:00:00">10:00 AM</option>
              <option value="10:15:00">10:15 AM</option>
              <option value="10:30:00">10:30 AM</option>
              <option value="10:45:00">10:45 AM</option>
              <option value="11:00:00">11:00 AM</option>
              <option value="11:15:00">11:15 AM</option>
              <option value="11:30:00">11:30 AM</option>
              <option value="11:45:00">11:45 AM</option>
              <option value="12:00:00">12:00 PM</option>
              <option value="12:15:00">12:15 PM</option>
              <option value="12:30:00">12:30 PM</option>
              <option value="12:45:00">12:45 PM</option>
              <option value="13:00:00">13:00 PM</option>
              <option value="13:15:00">13:15 PM</option>
              <option value="13:30:00">13:30 PM</option>
              <option value="13:45:00">13:45 PM</option>
              <option value="14:00:00">14:00 PM</option>
              <option value="14:15:00">14:15 PM</option>
              <option value="14:30:00">14:30 PM</option>
              <option value="14:45:00">14:45 PM</option>
              <option value="15:00:00">15:00 PM</option>
              <option value="15:15:00">15:15 PM</option>
              <option value="15:30:00">15:30 PM</option>
              <option value="15:45:00">15:45 PM</option>
              <option value="16:00:00">16:00 PM</option>
              <option value="16:15:00">16:15 PM</option>
              <option value="16:30:00">16:30 PM</option>
              <option value="16:45:00">16:45 PM</option>
              <option value="17:00:00">17:00 PM</option>
              <option value="17:15:00">17:15 PM</option>
              <option value="17:30:00">17:30 PM</option>
              <option value="17:45:00">17:45 PM</option>
              <option value="18:00:00">18:00 PM</option>
              <option value="18:15:00">18:15 PM</option>
              <option value="18:30:00">18:30 PM</option>
              <option value="18:45:00">18:45 PM</option>
              <option value="19:00:00">19:00 PM</option>
              <option value="19:15:00">19:15 PM</option>
              <option value="19:30:00">19:30 PM</option>
              <option value="19:45:00">19:45 PM</option>
              <option value="20:00:00">20:00 PM</option>
              <option value="20:15:00">20:15 PM</option>
              <option value="20:30:00">20:30 PM</option>
              <option value="20:45:00">20:45 PM</option>
              <option value="21:00:00">21:00 PM</option>
              <option value="21:15:00">21:15 PM</option>
              <option value="21:30:00">21:30 PM</option>
              <option value="21:45:00">21:45 PM</option>
              <option value="22:00:00">22:00 PM</option>
              <option value="22:15:00">22:15 PM</option>
              <option value="22:30:00">22:30 PM</option>
              <option value="22:45:00">22:45 PM</option>
              <option value="23:00:00">23:00 PM</option>
              <option value="23:15:00">23:15 PM</option>
              <option value="23:30:00">23:30 PM</option>
              <option value="23:45:00">23:45 PM</option>
              </select>
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                if($_SESSION['validCita'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Sin especificar.</p>
                    <p class="title-content-msg">Seleccione una opción de la lista.</p>
                  </div>';
                }
              ?>
        </div>

        <div class="field line">
          <label for="">Hora de llegada</label>
          <div class="info">
            <img src="img/date.png" alt="" class="icon">
            <select id="busqueda_hora" class="habilitar hora ocultar" name="horaLlegada">
              <option value="" selected></option>
              <option value="00:00:00">00:00 AM</option>
              <option value="00:15:00">00:15 AM</option>
              <option value="00:30:00">00:30 AM</option>
              <option value="00:45:00">00:45 AM</option>
              <option value="01:00:00">01:00 AM</option>
              <option value="01:15:00">01:15 AM</option>
              <option value="01:30:00">01:30 AM</option>
              <option value="01:45:00">01:45 AM</option>
              <option value="02:00:00">02:00 AM</option>
              <option value="02:15:00">02:15 AM</option>
              <option value="02:30:00">02:30 AM</option>
              <option value="02:45:00">02:45 AM</option>
              <option value="03:00:00">03:00 AM</option>
              <option value="03:15:00">03:15 AM</option>
              <option value="03:30:00">03:30 AM</option>
              <option value="03:45:00">03:45 AM</option>
              <option value="04:00:00">04:00 AM</option>
              <option value="04:15:00">04:15 AM</option>
              <option value="04:30:00">04:30 AM</option>
              <option value="04:45:00">04:45 AM</option>
              <option value="05:00:00">05:00 AM</option>
              <option value="05:15:00">05:15 AM</option>
              <option value="05:30:00">05:30 AM</option>
              <option value="05:45:00">05:45 AM</option>
              <option value="06:00:00">06:00 AM</option>
              <option value="06:15:00">06:15 AM</option>
              <option value="06:30:00">06:30 AM</option>
              <option value="06:45:00">06:45 AM</option>
              <option value="07:00:00">07:00 AM</option>
              <option value="07:15:00">07:15 AM</option>
              <option value="07:30:00">07:30 AM</option>
              <option value="07:45:00">07:45 AM</option>
              <option value="08:00:00">08:00 AM</option>
              <option value="08:15:00">08:15 AM</option>
              <option value="08:30:00">08:30 AM</option>
              <option value="08:45:00">08:45 AM</option>
              <option value="09:00:00">09:00 AM</option>
              <option value="09:15:00">09:15 AM</option>
              <option value="09:30:00">09:30 AM</option>
              <option value="09:45:00">09:45 AM</option>
              <option value="10:00:00">10:00 AM</option>
              <option value="10:15:00">10:15 AM</option>
              <option value="10:30:00">10:30 AM</option>
              <option value="10:45:00">10:45 AM</option>
              <option value="11:00:00">11:00 AM</option>
              <option value="11:15:00">11:15 AM</option>
              <option value="11:30:00">11:30 AM</option>
              <option value="11:45:00">11:45 AM</option>
              <option value="12:00:00">12:00 PM</option>
              <option value="12:15:00">12:15 PM</option>
              <option value="12:30:00">12:30 PM</option>
              <option value="12:45:00">12:45 PM</option>
              <option value="13:00:00">13:00 PM</option>
              <option value="13:15:00">13:15 PM</option>
              <option value="13:30:00">13:30 PM</option>
              <option value="13:45:00">13:45 PM</option>
              <option value="14:00:00">14:00 PM</option>
              <option value="14:15:00">14:15 PM</option>
              <option value="14:30:00">14:30 PM</option>
              <option value="14:45:00">14:45 PM</option>
              <option value="15:00:00">15:00 PM</option>
              <option value="15:15:00">15:15 PM</option>
              <option value="15:30:00">15:30 PM</option>
              <option value="15:45:00">15:45 PM</option>
              <option value="16:00:00">16:00 PM</option>
              <option value="16:15:00">16:15 PM</option>
              <option value="16:30:00">16:30 PM</option>
              <option value="16:45:00">16:45 PM</option>
              <option value="17:00:00">17:00 PM</option>
              <option value="17:15:00">17:15 PM</option>
              <option value="17:30:00">17:30 PM</option>
              <option value="17:45:00">17:45 PM</option>
              <option value="18:00:00">18:00 PM</option>
              <option value="18:15:00">18:15 PM</option>
              <option value="18:30:00">18:30 PM</option>
              <option value="18:45:00">18:45 PM</option>
              <option value="19:00:00">19:00 PM</option>
              <option value="19:15:00">19:15 PM</option>
              <option value="19:30:00">19:30 PM</option>
              <option value="19:45:00">19:45 PM</option>
              <option value="20:00:00">20:00 PM</option>
              <option value="20:15:00">20:15 PM</option>
              <option value="20:30:00">20:30 PM</option>
              <option value="20:45:00">20:45 PM</option>
              <option value="21:00:00">21:00 PM</option>
              <option value="21:15:00">21:15 PM</option>
              <option value="21:30:00">21:30 PM</option>
              <option value="21:45:00">21:45 PM</option>
              <option value="22:00:00">22:00 PM</option>
              <option value="22:15:00">22:15 PM</option>
              <option value="22:30:00">22:30 PM</option>
              <option value="22:45:00">22:45 PM</option>
              <option value="23:00:00">23:00 PM</option>
              <option value="23:15:00">23:15 PM</option>
              <option value="23:30:00">23:30 PM</option>
              <option value="23:45:00">23:45 PM</option>
              </select>
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                if($_SESSION['validHoraLlegada'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Sin especificar.</p>
                    <p class="title-content-msg">Seleccione una opción de la lista.</p>
                  </div>';
                }
              ?>
        </div>

        <div class="field line">
          <label for="">Fecha llegada</label>
          <div class="info">
            <img src="img/calendar.png" alt="" class="icon">
            <input type="text" value="Presiona aquí" class="datepicker fecha-llegada habilitar ocultar" name="fechaLlegada">
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                if($_SESSION['validFechaLlegada'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Sin especificar.</p>
                    <p class="title-content-msg">Seleccione una fecha en el calendario.</p>
                  </div>';
                }
              ?>
        </div>

        <div class="field line">
          <label for="">Fecha nacimiento</label>
          <div class="info">
            <img src="img/calendar.png" alt="" class="icon">
            <input type="text" value="Presiona aquí" class="datepicker fecha-llegada habilitar ocultar" name="nacimiento">
          </div>
          <!-- IMPRESION DE MENSAJE DE ERROR -->
          <?php
                if($_SESSION['validNacimiento'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Sin especificar.</p>
                    <p class="title-content-msg">Seleccione una fecha en el calendario.</p>
                  </div>';
                }
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
          <div class="container-buttons">
            <input type="button" class="button-cancel" value="Cancel" id="btn-cancel">
            <input type="submit" name=""  class="save" value="Guardar">
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
        <p class="title-box" style="display: inline;"></p>
        <button id="btn-cancel-2" class="btn-cancel" name="button">Cancelar</button>
    </div>
  </body>
</html>
