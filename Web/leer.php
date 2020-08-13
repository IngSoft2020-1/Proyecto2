<?php
session_start();
error_reporting(0);
/* CONEXION A LA BASE DE DATOS */
require 'conexion.php';

/* LIBRERIA DE PHPEXCEL */
require 'PHPExcel/PHPExcel/IOFactory.php';

if(!empty($_FILES['txtFile'])){
    /* IMPORTACION DEL ARCHIVO DE EXCEL */
    $guardarArchivo="Excel/migrantes.xlsx";
    $loc_temp_Archivo=$_FILES['txtFile']['tmp_name'];

    
    $nombreArchivo=$_FILES['txtFile']['name'];
    $ext = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    if ($ext !== 'xlsx') {
        /* MENSAJE DE ERROR EXTENSION INCORRECTA */
        $_SESSION['archivo'] = '0';
        exit();
    }
    /* SE GUARDA EL ARCHIVO EN EL SERVIDOR */
    move_uploaded_file($loc_temp_Archivo,$guardarArchivo);

    /* LECTURA E INSERCION DE DATOS ABAJO */
    date_default_timezone_set('America/Los_Angeles');
    $fecha_registro=date("Y-m-d H:i");
    $fecha_Creacion=date("Y-m-d");

    /* CONTADORES DE ACCIONES */
    $exitentes=0;
    $nuevos=0;
    $reservaciones=0;

    /* DATOS EXTRAIDOS DEL EXCEL */
    $fechaACT='';
    $fechaLlegadaACT='';
    $fechaSalidaACT='';
    $nacionalidadACT='';
    $telefonoACT='';
    $noseACT='';
    $fecha='';
    $nombre='';
    $nacimiento='';
    $fechaLlegada='';
    $fechaSalida='';
    $nacionalidad='';
    $telefono='';
    $nose='';

    /* CAMINO DEL ARCHIVO EXCEL EN EL SERVIDOR */
    $archivo="Excel/migrantes.xlsx";

    /* PARA ATRAPAR ERRORES DE LECTURA DEL EXCEL
    EJEMPLO: CUANDO SUBE UN IMAGEN A LA QUE LE CAMBIARON EL .JPG CON .XLSX'*/
    $reader = PHPExcel_IOFactory::createReader('Excel2007');
    if($reader->canRead($archivo))/* Aqui checa si se puede leer */
    {
        $pilaMigrantes = array();
        $conjunto=0;

        $objPHPExcel=PHPExcel_IOFactory::load($archivo);
        $objPHPExcel->setActiveSheetIndex(0);



        $numFilas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        /* Validaciones de la estructura del excel */
        for ($i=1; $i <$numFilas; $i++) {

            $fecha1 = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getFormattedValue();
            $fecha1 = strtok($fecha1,'(');
            $nombre1 = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getFormattedValue();
            $fecha2 = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getFormattedValue();
            $fecha2 = strtok($fecha2,'(');
            $hora1 = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getFormattedValue();
            $hora2 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getFormattedValue();
            $nacion1 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getFormattedValue();
            $telefono1 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getFormattedValue();
            $desconocido = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getFormattedValue();
            /* echo("FechaCita:".$fecha1." Nombre:".$nombre1." Nacimiento:".$fecha2." Hora1:".$hora1." hora2:".$hora2." nacion:".$nacion1." telefono: ".$telefono1." Desc:".$desconocido); */
            
            $regexHora='/\b(((1[0-2]|0?[1-9]):([0-5][0-9]):([0-5][0-9]))|((1[0-2]|0?[1-9]):([0-5][0-9]))) ?([AaPp][Mm])\b|"/';
            $regexFecha="/\b^(1[0-2]|0?[1-9])\/(3[01]|[12][0-9]|0?[1-9])\/([0-9]{4})\b/";
            $regexTelefono='/\b^[0-9]{3}-[0-9]{3}-[0-9]{4}$\b|"/';
            $val= array();
            $val[] = preg_match($regexFecha, $fecha1);
            $val[] = !empty($nombre1);
            $val[] = preg_match($regexFecha, $fecha2);
            $val[] = preg_match($regexHora, $hora1);
            $val[] = preg_match($regexHora, $hora2);
            if(preg_match('/"/',$nacion1))
            {
                {$val[] = true;}
            }
            else
            {
                $query = "SELECT IDPais FROM nacionalidad WHERE IDPais IN ('$nacion1')";
                $registros=mysqli_query($conexion,$query);
                if(mysqli_num_rows($registros) > 0)
                {$val[] = true;}
                else
                {$val[] = false;}
            }
            $val[] = preg_match($regexTelefono, $telefono1);
            $val[] = !empty($desconocido);
            
            if($val[0] && $val[1] && $val[2] && $val[3] && $val[4] && $val[5] && $val[6] && $val[7])
            {
                /* Pasa la prueba */
            }
            else if(!$val[0] && $val[1] && $val[2] && $val[3] && $val[4] && $val[5] && $val[6] && $val[7])
            {
                /* Pasa la prueba */
            }
            else if(!$val[0] && !$val[1] && !$val[2] && !$val[3] && !$val[4] && !$val[5] && !$val[6] && !$val[7])
            {
                /* Pasa la prueba */
            }
            else
            {
                echo "Error de formato en la linea $i.";/* Puesdes poner la linea con el error */
                /* MENSAJE ERROR CUANDO EL EXCEL NO TIENE EL FORMATO CORRECTO */
                /* echo(var_dump($val)); */
                $_SESSION['archivo'] = '1';
                exit();
            }
        }
        
        mysqli_begin_transaction($conexion, MYSQLI_TRANS_START_READ_WRITE);
        try {
            
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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
                    if ($telefono != '"' && $telefono != '') {
                        $telefonoACT = $telefono;
                    }else {
                        $telefono=$telefonoACT;
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
                        VALUES ('$nombre','$telefono','$nacimiento','$nacionalidad','$fecha','$fechaLlegada','$fechaSalida','$fecha_registro')";
                        mysqli_query($conexion,$query);
                        $nuevos++;

                        $pilaMigrantes[]=mysqli_insert_id($conexion);
                        $conjunto = 1;
                    }
                    mysqli_free_result($registros);

                    /* PARA IMPRIMIR LA ULTIMA FILA */
                    if($i==$numFilas-1 && count($pilaMigrantes)>0)
                    {
                        $personas= count($pilaMigrantes);
                        $cuarto="";
                        if($personas < 3)
                        {$cuarto="I";}
                        else if($personas == 3)
                        {$cuarto="D";}
                        else if($personas > 3)
                        {$cuarto="T";}
                        $fechaFin=date('Y-m-d',strtotime($fecha. "+1 days"));
                        $query="INSERT INTO reservacion (FechaInicio, Fechafin, DiasEstima, Creacion, Habitacion, Estado)
                        VALUES ('$fecha','$fechaFin','1','$fecha_Creacion','$cuarto','E')";
                        mysqli_query($conexion,$query);
                        $reservaciones++;

                        $idReser=mysqli_insert_id($conexion);
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
                    $cuarto="";
                    if($personas < 3)
                    {$cuarto="I";}
                    else if($personas == 3)
                    {$cuarto="D";}
                    else if($personas > 3)
                    {$cuarto="T";}
                    $fechaFin=date('Y-m-d',strtotime($fecha. "+1 days"));
                    $query="INSERT INTO reservacion (FechaInicio, Fechafin, DiasEstima, Creacion, Habitacion, Estado)
                        VALUES ('$fecha','$fechaFin','1','$fecha_Creacion','$cuarto','E')";
                    mysqli_query($conexion,$query);
                    $reservaciones++;

                    $idReser=mysqli_insert_id($conexion);

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
            
            /* echo "<script>console.log('Exportacion exitosa');</script>";
            echo "<script>console.log('Migrantes insertados: ".$nuevos."');</script>";
            echo "<script>console.log('Migrantes repetidos: ".$exitentes."');</script>";
            echo "<script>console.log('Reservaciones Creadas: ".$reservaciones."');</script>"; */
            
            /* MENSAJE DE EXITO */
            $_SESSION['archivo'] = '4';/* EXITO */

        } catch (mysqli_sql_exception $e) {
            mysqli_rollback($conexion);

            /* MENSAJE ERROR INESPERADO EN LA LECTURA DEL ARCHIVO */
            $_SESSION['archivo'] = '3';/* ERROR SQL */
        }
        mysqli_commit($conexion);
    }
    else
    {
        $_SESSION['archivo'] = '2';
        /* MENSAJE DE ERROR DE LECTURA DEL ARCHIVO */
    }
    
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