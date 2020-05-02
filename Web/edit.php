<?php
  session_start();
  error_reporting(0);

  if($_SESSION['listo'] == '1'){
    echo "<script>alert('Jalo.');</script>";
  }
  elseif($_SESSION['listo'] == '0'){
    echo "<script>alert('No jalo.');</script>";
  }
  $_SESSION['listo'] = "";
?>

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
                <th style="color: #EC6D4A;">Tipo de Usuario</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tasks"></tbody> <!--Donde se hace la magia con json-->
          </table>
      </div>
    </div>
  </body>
<script src="js/app.js"></script> <!--Manda a llamar al json-->

</html>
