<!--Elimina el usuario seleccionado-->
<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    if(isset($_POST['IDReser'])) {
        $IDReser = $_POST['IDReser'];

        $query = "SELECT visitante.IDVisi FROM reservacion
        INNER JOIN reservacion_visitante ON reservacion_visitante.IDReser=reservacion.IDReser
        INNER JOIN visitante ON reservacion_visitante.IDVisi=visitante.IDVisi WHERE reservacion.IDReser=2"; 
        $result = mysqli_query($conexion, $query);
        $reg = mysqli_fetch_array($resultado);
        echo $reg;

        /*$query = "DELETE reservacion_visitante FROM reservacion_visitante WHERE IDReser = '$IDReser'";
        $result = mysqli_query($conexion, $query);
        if(!$result) {
            die('Error');
        }
        $result = mysqli_query($conexion, $query);

        $query = "SELECT visitante.IDVisi FROM reservacion
        INNER JOIN reservacion_visitante ON reservacion_visitante.IDReser=reservacion.IDReser
        INNER JOIN visitante ON reservacion_visitante.IDVisi=visitante.IDVisi WHERE reservacion.IDReser=2"; 
        $result = mysqli_query($conexion, $query);
        if(!$result) {
            die('Error');
        }*/

        echo "Eliminado";
    }
?>