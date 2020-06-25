<?php
  session_start();
  error_reporting(0);
  if($_SESSION['datosMigrant'] == '1'){
    echo "<script>
    localStorage.setItem('datosBienMigrant', 1);
    </script>";
  }
  else if($_SESSION['datosMigrant'] == '0'){
    echo "<script>
    localStorage.setItem('datosMalMigrant', 1);
    </script>";
  }
  $_SESSION['datosMigrant'] = '';
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
        DE VALIDACION
    -->
    <script src="js/msg-alert.js"></script>
    <link rel="stylesheet" href="css/msg-alert.css">
    <!-- FIN DE LA LIBRERIA -->

    <!-- LIBRERIA PARA LOS POPUPS
    -->
    <script src="js/popup.js"></script>
    <link rel="stylesheet" href="css/popup.css">
    <!-- FIN DE LA LIBRERIA -->

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
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>
        <div class="field line">
          <label for="">Apellidos</label>
          <div class="info">
            <img src="img/name.png" alt="" class="icon">
            <input type="text" placeholder="Apellidos" class="textbox ocultar" name="apellidos" autocomplete="off">
          </div>
          <!-- IMPRESION DE ERRORES -->
          <?php
                if($_SESSION['validApellidos'] == '1')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">No se permiten espacios en blanco.</p>
                  </div>';
                } else if($_SESSION['validApellidos'] == '2')
                {
                  echo '<div class="container-msg">
                    <p class="title-msg">Formato Incorrecto!</p>
                    <p class="title-content-msg">Demasiado largo, debe ser menor a 60.</p>
                  </div>';
                } else if($_SESSION['validApellidos'] == '3')
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
            <input type="text" value="" class="txt-tel habilitar ocultar" name="telefono">
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
              <option selected></option>
              <option>Argentina</option>
              <option>San Bartolome</option>
              <option>Bolivia</option>
              <option>Brasil</option>
              <option>Chile</option>
              <option>Colombia</option>
              <option>Costa Rica</option>
              <option>Cuba</option>
              <option>Ecuador</option>
              <option>Guadalupe</option>
              <option>Guatemala</option>
              <option>Guyana Francesa</option>
              <option>Mexico</option>
              <option>Martinica</option>
              <option>Nicaragua</option>
              <option>Panama</option>
              <option>Peru</option>
              <option>Puerto Rico</option>
              <option>Paraguay</option>
              <option>Republica Dominicana</option>
              <option>El Salvador</option>
              <option>San Martin</option>
              <option>Uruguay</option>
              <option>Venezuela</option>
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
              ?>
        </div>

        <div class="field line">
          <label for="">Hora cita consulado</label>
          <div class="info">
            <img src="img/date.png" alt="" class="icon">
            <select id="busqueda_hora" class="habilitar hora ocultar" name="citaConsulado">
              <option value="" selected></option>
              <option value="12:00 AM">12:00 AM</option>
              <option value="12:15 AM">12:15 AM</option>
              <option value="12:30 AM">12:30 AM</option>
              <option value="12:45 AM">12:45 AM</option>
              <option value="01:00 AM">01:00 AM</option>
              <option value="01:15 AM">01:15 AM</option>
              <option value="01:30 AM">01:30 AM</option>
              <option value="01:45 AM">01:45 AM</option>
              <option value="02:00 AM">02:00 AM</option>
              <option value="02:15 AM">02:15 AM</option>
              <option value="02:30 AM">02:30 AM</option>
              <option value="02:45 AM">02:45 AM</option>
              <option value="03:00 AM">03:00 AM</option>
              <option value="03:15 AM">03:15 AM</option>
              <option value="03:30 AM">03:30 AM</option>
              <option value="03:45 AM">03:45 AM</option>
              <option value="04:00 AM">04:00 AM</option>
              <option value="04:15 AM">04:15 AM</option>
              <option value="04:30 AM">04:30 AM</option>
              <option value="04:45 AM">04:45 AM</option>
              <option value="05:00 AM">05:00 AM</option>
              <option value="05:15 AM">05:15 AM</option>
              <option value="05:30 AM">05:30 AM</option>
              <option value="05:45 AM">05:45 AM</option>
              <option value="06:00 AM">06:00 AM</option>
              <option value="06:15 AM">06:15 AM</option>
              <option value="06:30 AM">06:30 AM</option>
              <option value="06:45 AM">06:45 AM</option>
              <option value="07:00 AM">07:00 AM</option>
              <option value="07:15 AM">07:15 AM</option>
              <option value="07:30 AM">07:30 AM</option>
              <option value="07:45 AM">07:45 AM</option>
              <option value="08:00 AM">08:00 AM</option>
              <option value="08:15 AM">08:15 AM</option>
              <option value="08:30 AM">08:30 AM</option>
              <option value="08:45 AM">08:45 AM</option>
              <option value="09:00 AM">09:00 AM</option>
              <option value="09:15 AM">09:15 AM</option>
              <option value="09:30 AM">09:30 AM</option>
              <option value="09:45 AM">09:45 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="10:15 AM">10:15 AM</option>
              <option value="10:30 AM">10:30 AM</option>
              <option value="10:45 AM">10:45 AM</option>
              <option value="11:00 AM">11:00 AM</option>
              <option value="11:15 AM">11:15 AM</option>
              <option value="11:30 AM">11:30 AM</option>
              <option value="11:45 AM">11:45 AM</option>
              <option value="12:00 PM">12:00 PM</option>
              <option value="12:15 PM">12:15 PM</option>
              <option value="12:30 PM">12:30 PM</option>
              <option value="12:45 PM">12:45 PM</option>
              <option value="01:00 PM">01:00 PM</option>
              <option value="01:15 PM">01:15 PM</option>
              <option value="01:30 PM">01:30 PM</option>
              <option value="01:45 PM">01:45 PM</option>
              <option value="02:00 PM">02:00 PM</option>
              <option value="02:15 PM">02:15 PM</option>
              <option value="02:30 PM">02:30 PM</option>
              <option value="02:45 PM">02:45 PM</option>
              <option value="03:00 PM">03:00 PM</option>
              <option value="03:15 PM">03:15 PM</option>
              <option value="03:30 PM">03:30 PM</option>
              <option value="03:45 PM">03:45 PM</option>
              <option value="04:00 PM">04:00 PM</option>
              <option value="04:15 PM">04:15 PM</option>
              <option value="04:30 PM">04:30 PM</option>
              <option value="04:45 PM">04:45 PM</option>
              <option value="05:00 PM">05:00 PM</option>
              <option value="05:15 PM">05:15 PM</option>
              <option value="05:30 PM">05:30 PM</option>
              <option value="05:45 PM">05:45 PM</option>
              <option value="06:00 PM">06:00 PM</option>
              <option value="06:15 PM">06:15 PM</option>
              <option value="06:30 PM">06:30 PM</option>
              <option value="06:45 PM">06:45 PM</option>
              <option value="07:00 PM">07:00 PM</option>
              <option value="07:15 PM">07:15 PM</option>
              <option value="07:30 PM">07:30 PM</option>
              <option value="07:45 PM">07:45 PM</option>
              <option value="08:00 PM">08:00 PM</option>
              <option value="08:15 PM">08:15 PM</option>
              <option value="08:30 PM">08:30 PM</option>
              <option value="08:45 PM">08:45 PM</option>
              <option value="09:00 PM">09:00 PM</option>
              <option value="09:15 PM">09:15 PM</option>
              <option value="09:30 PM">09:30 PM</option>
              <option value="09:45 PM">09:45 PM</option>
              <option value="10:00 PM">10:00 PM</option>
              <option value="10:15 PM">10:15 PM</option>
              <option value="10:30 PM">10:30 PM</option>
              <option value="10:45 PM">10:45 PM</option>
              <option value="11:00 PM">11:00 PM</option>
              <option value="11:15 PM">11:15 PM</option>
              <option value="11:30 PM">11:30 PM</option>
              <option value="11:45 PM">11:45 PM</option>
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
              <option value="12:00 AM">12:00 AM</option>
              <option value="12:15 AM">12:15 AM</option>
              <option value="12:30 AM">12:30 AM</option>
              <option value="12:45 AM">12:45 AM</option>
              <option value="01:00 AM">01:00 AM</option>
              <option value="01:15 AM">01:15 AM</option>
              <option value="01:30 AM">01:30 AM</option>
              <option value="01:45 AM">01:45 AM</option>
              <option value="02:00 AM">02:00 AM</option>
              <option value="02:15 AM">02:15 AM</option>
              <option value="02:30 AM">02:30 AM</option>
              <option value="02:45 AM">02:45 AM</option>
              <option value="03:00 AM">03:00 AM</option>
              <option value="03:15 AM">03:15 AM</option>
              <option value="03:30 AM">03:30 AM</option>
              <option value="03:45 AM">03:45 AM</option>
              <option value="04:00 AM">04:00 AM</option>
              <option value="04:15 AM">04:15 AM</option>
              <option value="04:30 AM">04:30 AM</option>
              <option value="04:45 AM">04:45 AM</option>
              <option value="05:00 AM">05:00 AM</option>
              <option value="05:15 AM">05:15 AM</option>
              <option value="05:30 AM">05:30 AM</option>
              <option value="05:45 AM">05:45 AM</option>
              <option value="06:00 AM">06:00 AM</option>
              <option value="06:15 AM">06:15 AM</option>
              <option value="06:30 AM">06:30 AM</option>
              <option value="06:45 AM">06:45 AM</option>
              <option value="07:00 AM">07:00 AM</option>
              <option value="07:15 AM">07:15 AM</option>
              <option value="07:30 AM">07:30 AM</option>
              <option value="07:45 AM">07:45 AM</option>
              <option value="08:00 AM">08:00 AM</option>
              <option value="08:15 AM">08:15 AM</option>
              <option value="08:30 AM">08:30 AM</option>
              <option value="08:45 AM">08:45 AM</option>
              <option value="09:00 AM">09:00 AM</option>
              <option value="09:15 AM">09:15 AM</option>
              <option value="09:30 AM">09:30 AM</option>
              <option value="09:45 AM">09:45 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="10:15 AM">10:15 AM</option>
              <option value="10:30 AM">10:30 AM</option>
              <option value="10:45 AM">10:45 AM</option>
              <option value="11:00 AM">11:00 AM</option>
              <option value="11:15 AM">11:15 AM</option>
              <option value="11:30 AM">11:30 AM</option>
              <option value="11:45 AM">11:45 AM</option>
              <option value="12:00 PM">12:00 PM</option>
              <option value="12:15 PM">12:15 PM</option>
              <option value="12:30 PM">12:30 PM</option>
              <option value="12:45 PM">12:45 PM</option>
              <option value="01:00 PM">01:00 PM</option>
              <option value="01:15 PM">01:15 PM</option>
              <option value="01:30 PM">01:30 PM</option>
              <option value="01:45 PM">01:45 PM</option>
              <option value="02:00 PM">02:00 PM</option>
              <option value="02:15 PM">02:15 PM</option>
              <option value="02:30 PM">02:30 PM</option>
              <option value="02:45 PM">02:45 PM</option>
              <option value="03:00 PM">03:00 PM</option>
              <option value="03:15 PM">03:15 PM</option>
              <option value="03:30 PM">03:30 PM</option>
              <option value="03:45 PM">03:45 PM</option>
              <option value="04:00 PM">04:00 PM</option>
              <option value="04:15 PM">04:15 PM</option>
              <option value="04:30 PM">04:30 PM</option>
              <option value="04:45 PM">04:45 PM</option>
              <option value="05:00 PM">05:00 PM</option>
              <option value="05:15 PM">05:15 PM</option>
              <option value="05:30 PM">05:30 PM</option>
              <option value="05:45 PM">05:45 PM</option>
              <option value="06:00 PM">06:00 PM</option>
              <option value="06:15 PM">06:15 PM</option>
              <option value="06:30 PM">06:30 PM</option>
              <option value="06:45 PM">06:45 PM</option>
              <option value="07:00 PM">07:00 PM</option>
              <option value="07:15 PM">07:15 PM</option>
              <option value="07:30 PM">07:30 PM</option>
              <option value="07:45 PM">07:45 PM</option>
              <option value="08:00 PM">08:00 PM</option>
              <option value="08:15 PM">08:15 PM</option>
              <option value="08:30 PM">08:30 PM</option>
              <option value="08:45 PM">08:45 PM</option>
              <option value="09:00 PM">09:00 PM</option>
              <option value="09:15 PM">09:15 PM</option>
              <option value="09:30 PM">09:30 PM</option>
              <option value="09:45 PM">09:45 PM</option>
              <option value="10:00 PM">10:00 PM</option>
              <option value="10:15 PM">10:15 PM</option>
              <option value="10:30 PM">10:30 PM</option>
              <option value="10:45 PM">10:45 PM</option>
              <option value="11:00 PM">11:00 PM</option>
              <option value="11:15 PM">11:15 PM</option>
              <option value="11:30 PM">11:30 PM</option>
              <option value="11:45 PM">11:45 PM</option>
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

  </body>
</html>
