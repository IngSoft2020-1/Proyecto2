<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    $query = "SELECT reservacion.IDReser AS 'NumeroReservacion',
    reservacion.Fechafin as 'DiaSalida',
    visitante.cita_consulado as 'CitaConsulado',
    visitante.Nombre AS 'Nombre'
    FROM reservacion_visitante 
    INNER JOIN reservacion ON reservacion.IDReser = reservacion_visitante.IDReser 
    INNER join visitante on reservacion_visitante.IDVisi = visitante.IDVisi 
    WHERE Fechafin BETWEEN curdate() AND curdate() + INTERVAL 3 day AND Estado LIKE 'P'
    ORDER BY cita_consulado ASC";
    $resultado = mysqli_query($conexion, $query);

    if(!$resultado) {
        die('Error'.mysqli_error($conexion));
    }

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $cita = date("h:i A", strtotime($row['CitaConsulado']));
        $json[] = array(
            'NumeroReservacion' => $row['NumeroReservacion'],
            'DiaSalida' => $row['DiaSalida'],
            'CitaConsulado' => $cita,
            'Nombre' => $row['Nombre']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>