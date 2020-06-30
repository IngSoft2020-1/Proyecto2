<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    if(isset($_POST['ID'])) {
        $ID = $_POST['ID'];

        $query = "select IDReserVisi from reservacion_visitante where IDVisi='$ID'";
        $resultado = mysqli_query($conexion, $query);

        if(isset($resultado))
        {
            $query = "delete from reservacion_visitante where IDVisi='$ID'";
            mysqli_query($conexion, $query);
        }

        $query = "delete from visitante where IDVisi='$ID'";
        $result = mysqli_query($conexion, $query);
    }
?>