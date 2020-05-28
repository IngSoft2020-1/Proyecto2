<?php
date_default_timezone_set('America/Los_Angeles');

require 'conexion.php';
require 'PHPExcel/PHPExcel/IOFactory.php';
/* require 'conexion.php'; */

$exitentes=0;
$nuevos=0;

$archivo='Ejemplo.xlsx';

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
        }
        /* echo "$nombre,$telefono,$nacimiento,Mex,$fecha,$fechaLlegada,$fechaSalida,$fecha_registro"; */
        mysqli_free_result($registros);
    }
}
echo "Datos insertados: $nuevos Datos repetidos: $exitentes";

/* function calcularEdad($fechanacimiento){
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