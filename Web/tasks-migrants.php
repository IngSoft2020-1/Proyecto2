<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    $query="SELECT visitante.IDVisi AS 'IDVisi',
    visitante.Nombre AS 'Nombre',
    visitante.Telefono AS 'Telefono',
    DATE_FORMAT(visitante.Fecha_nac, '%m/%d/%Y') AS 'FechaNacimiento',
    nacionalidad.IDPais AS 'IDPais',
    nacionalidad.Pais AS 'Pais',
    DATE_FORMAT(visitante.fecha_llegada, '%m/%d/%Y') AS 'FechaLlegada',
    DATE_FORMAT(visitante.hora_llegada, '%H:%i %p') AS 'HoraLlegada',
    visitante.hora_llegada AS 'HoraLlegada2',
    DATE_FORMAT(visitante.cita_consulado, '%H:%i %p') AS 'CitaConsulado',
    visitante.cita_consulado AS 'CitaConsulado2'
    FROM visitante 
    INNER JOIN nacionalidad ON nacionalidad.IDPais = visitante.IDNacion 
    ORDER BY fecha_llegada DESC";

    $resultado = mysqli_query($conexion, $query);

    if(!$resultado) {
        die('Error'.mysqli_error($conexion));
    }

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'IDVisi' => $row['IDVisi'],
            'Nombre' => $row['Nombre'],
            'Telefono' => $row['Telefono'],
            'FechaNacimiento' => $row['FechaNacimiento'],
            'Pais' => $row['Pais'],
            'IDPais' => $row['IDPais'],
            'FechaLlegada' => $row['FechaLlegada'],
            'HoraLlegada' => $row['HoraLlegada'],
            'CitaConsulado' => $row['CitaConsulado']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>