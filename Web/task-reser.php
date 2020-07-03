<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    $query = "SELECT reservacion.IDReser AS 'IDReservacion', reservacion.FechaInicio AS 'FechadeInicio', reservacion.DiasEstima AS 'Diasestimados', 
    estado.Estado AS 'Estadoreservacion', tipohabitacion.ID AS 'IDHabitacion', tipohabitacion.TipoHabitacion AS 'Tipodehabitacion' 
    FROM reservacion INNER JOIN tipohabitacion ON tipohabitacion.ID=reservacion.Habitacion INNER JOIN estado ON estado.ID=reservacion.Estado";
    $resultado = mysqli_query($conexion, $query);


    $json = array();
    while($row = mysqli_fetch_array($resultado))
    {
        $ID = $row['IDReservacion'];


        // echo '<script>';
        // echo 'console.log('. $ID .');';
        // echo '</script>';


        $query2 = "SELECT visitante.Nombre AS 'Nombres', visitante.IDVisi AS 'IDVisitante' FROM reservacion_visitante INNER JOIN reservacion ON 
        reservacion.IDReser = reservacion_visitante.IDReser INNER JOIN 
        visitante ON reservacion_visitante.IDVisi= visitante.IDVisi WHERE reservacion.IDReser=$ID";
        $resultado2 = mysqli_query($conexion, $query2);
        while($row2 = mysqli_fetch_array($resultado2))
        {
            $json[] = array(
                'IDReservacion' => $row['IDReservacion'],
                'FechadeInicio' => $row['FechadeInicio'],
                'Diasestimados' => $row['Diasestimados'],
                'Estadoreservacion' => $row['Estadoreservacion'],
                'IDHabitacion' => $row['IDHabitacion'],
                'Tipodehabitacion' => $row['Tipodehabitacion'],
                'Nombres' => $row2['Nombres'],
                'IDVisitante' => $row2['IDVisitante']
            );
        }
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>