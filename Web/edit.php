<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- JQUERY -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="css/edit.css">
    <title>Editar</title>
  </head>
  <body>
    <div class="container">
      <div class="container-img" id="aling-left">
        <input type="text" name="search" placeholder="Search.." id="search-edit" autocomplete="off">
      </div>
      <div class="container-table" style="overflow-x:auto;">
        <table id="table-edit">
            <thead>
              <tr>
                <th style="color: #00FF80;">Nombre</th>
                <th style="color: #00FF80;">Correo</th>
                <th style="color: #EC6D4A;">Telefono</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tasks"></tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
  <!--
  <div class="popup-personalizado">
    <p class="popup-texto">¿Estás seguro que deseas eliminar este perfil?</p>
    <form class="form-popup">
      <input type="button" name="" value="Cancelar" class="textbox-popup cancel">
      <input type="submit" name="" value="Aceptar" class="textbox-popup">
    </form>
  </div>
  -->
<script src="js/app.js"></script> <!--Manda a llamar al json-->

</html>
