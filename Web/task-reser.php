<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    $query = "select reservacion.IDReser, 
    reservacion.FechaInicio,
    reservacion.DiasEstima, 
    reservacion.Estado,
    visitante.IDVisi,
    visitante.Ape_Mat,
    visitante.Ape_Pat, 
    visitante.Nombre, 
    visitante.Telefono,
    visitante.Edad, 
    visitante.IDNacion from reservacion
    inner join reservacion_visitante on reservacion_visitante.IDReser = reservacion.IDREser 
    inner join visitante on visitante.IDVisi = reservacion_visitante.IDVisi order by reservacion.IDReser asc";
    $resultado = mysqli_query($conexion, $query);

    if(!$resultado) {
        die('Error'.mysqli_error($conexion));
    }

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'IDReser' => $row['IDReser'],
            'FechaInicio' => $row['FechaInicio'],
            'DiasEstima' => $row['DiasEstima'],
            'Estado' => $row['Estado'],
            'IDVisi' => $row['IDVisi'],
            'Nombre' => $row['Nombre'],
            'Ape_Pat' => $row['Ape_Pat'],
            'Ape_Mat' => $row['Ape_Mat'],
            'Telefono' => $row['Telefono'],
            'Edad' => $row['Edad'],
            'IDNacion' => $row['IDNacion']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>