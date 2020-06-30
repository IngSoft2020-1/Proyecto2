<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    if(isset($_POST['ID'])) {
        $ID = $_POST['ID'];

        $query = "delete from visitante where IDVisi='$ID'";
        $result = mysqli_query($conexion, $query);
        if(!$result) {
            die('Error');
        }
        echo "Eliminado";
    }
?>