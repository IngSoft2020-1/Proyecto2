<?php
    session_start();
    date_default_timezone_set('America/Los_Angeles');
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");
    $tiempo= $_GET['data'];
    $actual=date('Y-m-d');
    $fechalim;
    $query;
    /* echo "Timepo: ".$tiempo; */
    if($tiempo==0)
    {
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
        /* echo "Busqueda todos".$tiempo; */
    }
    else if($tiempo==7)/* 7 DIAS */
    {
        $fechalim=date ( 'Y-m-d' , strtotime ( $actual . ' + 7 days' ));/* OBTIENE FECHA ACTUAL Y LE SUMA 7 DIAS */
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
        WHERE visitante.fecha_llegada>='$actual' AND visitante.fecha_llegada<='$fechalim'
        ORDER BY `fecha_llegada`  DESC";
        /* echo "Busqueda 7 dias".$tiempo; */
    }
    else if($tiempo==1)
    {
        $fechalim=date ( 'Y-m-d' , strtotime ( $actual . ' - 1 month' ));/* OBTIENE FECHA ACTUAL Y RESTA 1 MES */
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
        WHERE visitante.fecha_llegada<'$actual' AND visitante.fecha_llegada>='$fechalim'
        ORDER BY `fecha_llegada`  DESC";
        /* echo "Busqueda 1 mes".$tiempo; */
    }
    else if($tiempo==3)
    {
        $fechalim=date ( 'Y-m-d' , strtotime ( $actual . ' - 3 month' ));;/* OBTIENE FECHA ACTUAL Y RESTA 1 MES */
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
        WHERE visitante.fecha_llegada<'$actual' AND visitante.fecha_llegada>='$fechalim'
        ORDER BY `fecha_llegada`  DESC";
    }
    else if($tiempo==6)
    {
        $fechalim=$actual. date ( 'Y-m-d' , strtotime ( $actual . ' - 6 month' ));;/* OBTIENE FECHA ACTUAL Y RESTA 1 MES */
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
        WHERE visitante.fecha_llegada<'$actual' AND visitante.fecha_llegada>='$fechalim'
        ORDER BY `fecha_llegada`  DESC";
    }
    $resultado = mysqli_query($conexion, $query);
    /* echo "<script>console.log('QUERRY= $query');</script>"; */
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
            'HoraLlegada2' => $row['HoraLlegada2'],
            'CitaConsulado' => $row['CitaConsulado'],
            'CitaConsulado2' => $row['CitaConsulado2']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>