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
  </head>
  <body>
    <div class="container">
      <form action="register.php" method="post" autocomplete="off">
        <div class="field line">
          <label for="">Nombre</label>
          <div class="info">
            <img src="img/name.png" alt="" class="icon">
            <input type="text" placeholder="Nombre" class="textbox ocultar" name="nombre" autocomplete="off">
          </div>
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
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>


        <div class="field line">
          <label for="">Telefono</label>
          <div class="info">
            <img src="img/phone.png" alt="" class="icon">
            <input type="text" value="" class="txt-tel habilitar ocultar">
          </div>
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>


        <div class="field line">
          <label for="">Nacionalidad</label>
          <div class="info">
            <img src="img/global.png" alt="" class="icon">
            <select class="habilitar ignorar pais ocultar ">
              <option selected></option>
              <option>Argentina</option>
              <option>San Bartolome</option>
              <option>Bolivia</option>
              <option>Brasil</option>
              <option>Chile</option>
              <option>Colombia</option>
              <option>Cota Rica</option>
              <option>Cuba</option>
              <option>Ecuador></option>
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
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>

        <div class="field line">
          <label for="">Hora cita consulado</label>
          <div class="info">
            <img src="img/date.png" alt="" class="icon">
            <select id="busqueda_hora" class="habilitar hora ocultar">
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
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>

        <div class="field line">
          <label for="">Hora de llegada</label>
          <div class="info">
            <img src="img/date.png" alt="" class="icon">
            <select id="busqueda_hora" class="habilitar hora ocultar">
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
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>


        <div class="field line">
          <label for="">Fecha llegada</label>
          <div class="info">
            <img src="img/calendar.png" alt="" class="icon">
            <input type="text" value="Presiona aquí" class="datepicker fecha-llegada habilitar ocultar">
          </div>
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>

        <div class="field line">
          <label for="">Fecha nacimiento</label>
          <div class="info">
            <img src="img/calendar.png" alt="" class="icon">
            <input type="text" value="Presiona aquí" class="datepicker fecha-llegada habilitar ocultar">
          </div>
          <!-- ELEMENTOS Y CLASES PARA USAR LIBREARIA CREADA POR EDUARDO BLANCO -->
          <div class="container-msg">
            <p class="title-msg">Dato incorrecto</p>
            <p class="title-content-msg">No se permiten campos vacios</p>
          </div>
          <!-- FIN -->
        </div>
        <div class="field max">
          <div class="container-buttons">
            <input type="button" class="button-cancel" value="Cancel">
            <input type="button" name=""  class="save" value="Guardar">
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
