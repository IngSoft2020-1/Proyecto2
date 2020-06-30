<?php
/* CONEXION A LA BASE DE DATOS */
require 'conexion.php';
/* LIBRERIA DE PHPEXCEL */
require 'PHPExcel/PHPExcel/IOFactory.php';

if(isset($_POST['subida'])){
    
    /* EXPORTACION DE ARCHIVO DE EXCEL */
    $guardarArchivo="Excel/migrantes.xlsx";
    $loc_temp_Archivo=$_FILES['file']['tmp_name'];
    move_uploaded_file($loc_temp_Archivo,$guardarArchivo);

    /* LECTURA E INSERCION DE DATOS ABAJO */
    date_default_timezone_set('America/Los_Angeles');

    $exitentes=0;
    $nuevos=0;
    $reservaciones=0;
    $conjunto=0;

    $archivo="Excel/migrantes.xlsx";

    $objPHPExcel=PHPExcel_IOFactory::load($archivo);
    $objPHPExcel->setActiveSheetIndex(0);

    $numFilas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    $fechaACT='';
    $fechaLlegadaACT='';
    $fechaSalidaACT='';
    $nacionalidadACT='';
    $noseACT='';

    $fecha='';
    $nombre='';
    $nacimiento='';
    $fechaLlegada='';
    $fechaSalida='';
    $nacionalidad;
    $telefono='';
    $nose='';

    $fecha_registro=date("Y-m-d H:i");
    $fecha_Creacion=date("Y-m-d");

    $pilaMigrantes = array();
    for ($i=1; $i <$numFilas; $i++) {

        $nombre=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        
        if ($nombre!='') {
            
            $fecha=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getFormattedValue();
            if ($fecha!='') {
                $fecha=date("Y-m-d",strtotime($fecha));
                $fechaACT=$fecha;
            }
            else {
                $fecha=$fechaACT;
            }
            
            $nacimiento=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getFormattedValue();
            $nacimiento=date("Y-m-d",strtotime(strtok($nacimiento,'(')));
            
            $fechaLlegada=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            if ($fechaLlegada!='"' && $fechaLlegada!='') {
                $fechaLlegada=date("H:i",strtotime($fechaLlegada));
                $fechaLlegadaACT=$fechaLlegada;
            }
            else {
                $fechaLlegada=$fechaLlegadaACT;
            }

            $fechaSalida=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
            if ($fechaSalida!='"' && $fechaSalida!='') {
                $fechaSalida=date("H:i",strtotime($fechaSalida));
                $fechaSalidaACT=$fechaSalida;
            }
            else {
                $fechaSalida=$fechaSalidaACT;
            }

            $nacionalidad=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
            if ($nacionalidad!='"' && $nacionalidad!='') {
                $nacionalidadACT=$nacionalidad;
            }
            else {
                $nacionalidad=$nacionalidadACT;
            }
            
            $telefono=$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
            if ($telefono=='"' || $telefono=='') {
                $telefono="";
            }

            $nose=$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
            if ($nose!='"' && $nose!='') {
                $noseACT=$nose;
            }
            else {
                $nose=$noseACT;
            }
            
            $registros=mysqli_query($conexion,"SELECT IDVisi FROM visitante WHERE Nombre='$nombre' AND Fecha_nac='$nacimiento'") or
            die("Problemas en el select:".mysqli_error($conexion));

            if(mysqli_num_rows($registros) > 0)
            {
                $exitentes++;
            }
            else
            {
                if(strlen($nombre)>100){
                    $nombre= substr($nombre,0,100);
                }
                if(strlen($telefono)>13){
                    $telefono= substr($telefono,0,13);
                }
                
                $query="INSERT INTO visitante (Nombre, Telefono, Fecha_nac, IDNacion, fecha_llegada, hora_llegada, cita_consulado, fecha_registro) 
                values ('$nombre','$telefono','$nacimiento','Mex','$fecha','$fechaLlegada','$fechaSalida','$fecha_registro')";
                mysqli_query($conexion,$query)
                or die("Problemas de insercion.".mysqli_error($conexion));
                $nuevos++;

                /* $migranteSQL=mysqli_query($conexion,"SELECT IDVisi FROM visitante 
                WHERE Nombre='$nombre' 
                AND Telefono='$telefono'
                AND Fecha_nac='$fecha'
                AND IDNacion= 'Mex'
                AND fecha_llegada = '$fecha'
                AND hora_llegada = '$fechaLlegada'
                AND cita_consulado = '$fechaSalida'
                AND fecha_registro = '$fecha_registro'") or
                die("Problemas en el select:".mysqli_error($conexion));

                $fila = mysqli_fetch_assoc($migranteSQL);

                $idMigrante=$fila['IDVisi']; */

                $pilaMigrantes[]=mysqli_insert_id($conexion);
                $conjunto = 1;
            }
            mysqli_free_result($registros);

            /* PARA IMPRIMIR LA ULTIMA FILA */
            if($i==$numFilas-1 && count($pilaMigrantes)>0)
            {
                /* echo "<script>console.log('".$i."');</script>"; */
                $personas= count($pilaMigrantes);
                $query="INSERT INTO reservacion (FechaInicio, Fechafin, DiasEstima, Creacion, Habitacion, Estado) 
                    VALUES ('$fecha','$fecha','1','$fecha_Creacion','I','E')";
                mysqli_query($conexion,$query);
                $reservaciones++;

                $idReser=mysqli_insert_id($conexion);
                /* echo "<script>console.log('".$personas."');</script>"; */
                for($o=0; $o <$personas; $o++)
                {
                    $IDddddddddddd= $pilaMigrantes[$o];
                    $query="INSERT INTO reservacion_visitante (IDReser, IDVisi) 
                    values ('$idReser','$IDddddddddddd')";
                    mysqli_query($conexion,$query);
                }

                $pilaMigrantes=array();
                $conjunto=0;
            }
        }
        else if($conjunto==1)
        {
            $personas= count($pilaMigrantes);
            $query="INSERT INTO reservacion (FechaInicio, Fechafin, DiasEstima, Creacion, Habitacion, Estado) 
                VALUES ('$fecha','$fecha','1','$fecha_Creacion','I','E')";
            mysqli_query($conexion,$query);
            $reservaciones++;

            /* $reservacionSQL=mysqli_query($conexion,"SELECT IDReser FROM reservacion 
            WHERE FechaInicio='$fecha' 
            AND FechaFin='$fecha'
            AND DiasEstima='1'
            AND PersonasEstima= '$personas'
            AND FechaCreacion = '$fecha_Creacion'
            AND Habitacion = 'I'
            AND Estado = 'E'")
            or die("Problemas en el select:".mysqli_error($conexion));

            $reser = mysqli_fetch_assoc($reservacionSQL); */

            $idReser=mysqli_insert_id($conexion);
            /* echo "<script>console.log('".$personas."');</script>"; */
            for($o=0; $o <$personas; $o++)
            {
                $IDddddddddddd= $pilaMigrantes[$o];
                $query="INSERT INTO reservacion_visitante (IDReser, IDVisi) 
                values ('$idReser','$IDddddddddddd')";
                mysqli_query($conexion,$query);
            }

            $pilaMigrantes=array();
            $conjunto=0;
        }
    }
    /* NO AVIENTA LA ALERTA AAAAASDASDASDASDAd */
    /* echo "<script type='text/javascript'>alert('Exportacion exitosa
    Migrantes insertados: ".$nuevos."
    Migrantes repetidos: ".$exitentes."
    Reservaciones Creadas: ".$reservaciones.");</script>"; */
    /* ASDASDASDASDA */
    header("location:migrant.php");
}

/*function calcularEdad($fechanacimiento){
    list($dia,$mes,$ano) = explode("/",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($ano_diferencia > 0) {
        return $ano_diferencia." años";
    }
    else {
        return $mes_diferencia." meses";
    }
} */
?>