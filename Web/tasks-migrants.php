<?php
    session_start();
    error_reporting(0);

    //Coneccion a la base de datos
    require 'conexion.php';

    $orden= $_GET['data1'];
    $tiempo= $_GET['data2'];

    //Consulta base de la tabla migrantes
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
    visitante.cita_consulado AS 'CitaConsulado2',
    reservacion.IDReser
    FROM visitante
    LEFT JOIN reservacion_visitante ON reservacion_visitante.IDVisi = visitante.IDVisi
    LEFT JOIN reservacion ON reservacion_visitante.IDReser = reservacion.IDReser
    INNER JOIN nacionalidad ON nacionalidad.IDPais = visitante.IDNacion";

    //Agrega las fechas que se buscan en la consulta
    if ($tiempo == 1) //Un mes atras
    {
        $query .= " WHERE fecha_llegada > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 1 month";
    }
    else if ($tiempo == 3) //Tres meses atras
    {
        $query .= " WHERE fecha_llegada > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 3 month";
    }
    else if ($tiempo == 6) //Seis meses atras
    {
        $query .= " WHERE fecha_llegada > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month";
    }
    else if ($tiempo == 7) //Siete dias en adelante
    {
        $query .= " WHERE fecha_llegada > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 1 week";
    }

    //Agrega el orden que se quiere la consulta
    if($orden == 1) //Fecha asendiente
    {
        $query .= " ORDER BY fecha_llegada ASC, reservacion.IDReser DESC";
    }
    else if($orden == 2) //Fecha desendiente
    {
        $query .= " ORDER BY fecha_llegada DESC, reservacion.IDReser DESC";
    }
    else if($orden == 3) //Nombre asendiente
    {
        $query .= " ORDER BY Nombre ASC";
    }
    else if($orden == 4) //Nombre desendiente
    {
        $query .= " ORDER BY Nombre DESC";
    }

    //Hacemos y guardamos el resultado de la consulta
    $resultado = mysqli_query($conexion, $query);
    if(!$resultado) {
        die('Error'.mysqli_error($conexion));
    }
    //Cerramos conexion con el servidor
    mysqli_close ($conexion);

    //Creamos un array para guardar los datos
    $json = array();
    //Ingresamos los datos de nuestra consulta en el array
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
            'HoraLlegada2' => $row['HoraLlegada2'],
            'CitaConsulado' => $row['CitaConsulado'],
            'CitaConsulado2' => $row['CitaConsulado2'],
            'IDReser' => $row['IDReser']
        );
    }
    //Convertimos el arreglo a algo que javascript entienda
    $jsonstring = json_encode($json);
    //Regresamos el arreglo
    echo $jsonstring;
?>