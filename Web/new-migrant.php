<?php
    session_start();
    error_reporting(0);
    $patronNombre = '/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u';
    $conexion=mysqli_connect("localhost","root","","derechoscopio") 
    or die("Problemas con la conexión");

    echo "<script type='text/javascript'>console.log('hola');</script>";

    $nombres = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $telefono = $_REQUEST['telefono'];
    $nacionalidad = $_REQUEST['nacionalidad'];
    $citaConsulado= $_REQUEST['citaConsulado'];
    $horaLlegada= $_REQUEST['horaLlegada'];
    $fechaLlegada= $_REQUEST['fechaLlegada'];
    $nacimiento = $_REQUEST['nacimiento'];

    $_SESSION['validNombres'] = '0';
    $_SESSION['validApelllidos'] = '0';
    $_SESSION['validTelefono'] = '0';
    $_SESSION['validNacion'] = '0';
    $_SESSION["validCita"]='0';
    $_SESSION['validHoraLlegada']='0';
    $_SESSION['validFechaLlegada']='0';
    $_SESSION['validNacimiento']='0';

    $fecha_registro=date("Y-m-d H:i");

    /* VALIDACIONES CAMPO NOMBRE */
    if($nombres == '')//ESTA VACIO
    {
        $_SESSION['validNombres'] = '1';
    } 
    else if(strlen($nombres)>100)//MUY LARGO
    {
        $_SESSION['validNombres'] = '2';
    }
    else if(!preg_match($patronNombre,$nombres))//FORMATO NOMBRE
    {
        $_SESSION['validNombres'] = '3';
    }
    echo "<script type='text/javascript'>alert('$nombres');</script>";

    /* VALIDACIONES CAMPO APELLIDOS */
    if($apellidos == '')//ESTA VACIO
    {
        $_SESSION['validApelllidos'] = '1';
    } 
    else if(strlen($apellidos)>60)//MUY LARGO
    {
        $_SESSION['validApelllidos'] = '2';
    }
    else if(!preg_match($patronNombre,$apellidos))//FORMATO NOMBRE
    {
        $_SESSION['validApelllidos'] = '3';
    }
    echo "<script type='text/javascript'>alert('$apellidos');</script>";

    /* VALIDACIONES CAMPO TELEFONO */
    if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $telefono))//FORMATO CORREO
    {
        $_SESSION['validTelefono'] = '1';
    }
    echo "<script type='text/javascript'>alert('$telefono');</script>";

    /* VALIDACIONES CAMPO NACION*/
    
    if($nacionalidad == '')//ESTA VACIO
    {
        $_SESSION['validNacion'] = '1';
    }
    else
    {  /* SI EXISTE EL PAIS BUSCA LA ID QUE LE CORRESPONDE */
        $registros=mysqli_query($conexion,"SELECT IDPais FROM nacionalidad WHERE pais='$nacionalidad'");
        $fila=mysqli_fetch_assoc($registros);
        $nacionalidad=$fila['IDPais'];//IMPRIME BUSCA LA ID DE LA NACIONALIDAD Y LA COLOCA EN LA NACIONALIDAD
    }
    echo "<script type='text/javascript'>alert('$nacionalidad');</script>";

    /* VALIDACIONES CAMPO CITA*/
    if($citaConsulado == '')//ESTA VACIO
    {
        $_SESSION['validCita'] = '1';
    }
    else
    {/* CONVIERTE A UNA HORA VALIDA PARA LA BASE DE DATOS */
        $hora = substr($citaConsulado, 0, 5);
        $itenerario= substr($citaConsulado,4,2);
        $itenerario=strtolower($itenerario);
        $citaConsulado=$hora.$itenerario;
        $citaConsulado = strtotime($citaConsulado);
        $citaConsulado = date("H:i", $citaConsulado);
    }
    echo "<script type='text/javascript'>alert('$citaConsulado');</script>";

    /* VALIDACIONES CAMPO HORALLEGADA*/
    if($horaLlegada == '')//ESTA VACIO
    {
        $_SESSION['validHoraLlegada'] = '1';
    }
    else
    {/* CONVIERTE A UNA HORA VALIDA PARA LA BASE DE DATOS */
        $hora = substr($horaLlegada, 0, 5);
        $itenerario= substr($horaLlegada,4,2);
        $itenerario=strtolower($itenerario);
        $horaLlegada=$hora.$itenerario;
        $horaLlegada = strtotime($horaLlegada);
        $horaLlegada = date("H:i", $horaLlegada);
    }
    echo "<script type='text/javascript'>alert('$horaLlegada');</script>";

    /* VALIDACIONES CAMPO FECHALLEGADA*/
    if($fechaLlegada == '')//ESTA VACIO
    {
        $_SESSION['validFechaLlegada'] = '1';
    }
    else
    {
        $ano = substr($fechaLlegada, 6, 4); 
        $mes = substr($fechaLlegada, 0, 2); 
        $dia = substr($fechaLlegada, 3, 2); 
        $acomodada = $ano."-".$mes."-".$dia;
        $trans = strtotime($acomodada);
        $fechaLlegada = date('Y-m-d', $trans);
    }
    echo "<script type='text/javascript'>alert('$fechaLlegada ');</script>";

    /* VALIDACIONES CAMPO NACIMIENTO0*/
    if($nacimiento == '')//ESTA VACIO
    {
        $_SESSION['validNacimiento'] = '1';
    }
    else
    {
        $ano = substr($fechaLlegada, 6, 4); 
        $mes = substr($fechaLlegada, 0, 2); 
        $dia = substr($fechaLlegada, 3, 2); 
        $acomodada = $ano."-".$mes."-".$dia;
        $trans = strtotime($acomodada);
        $fechaLlegada = date('Y-m-d', $trans);
    }
    echo "<script type='text/javascript'>alert('$nacimiento');</script>";

    /* UPDATE DEL LOS DATOS GENERALES DEL USUARIO */
    if ($_SESSION['validNombres'] == '0' && $_SESSION['validApelllidos'] == '0' && $_SESSION['validTelefono'] == '0' && $_SESSION['validNacion'] = '0'
    && $_SESSION['validCita'] = '0' && $_SESSION['validHoraLlegada'] = '0' && $_SESSION['validFechaLlegada'] = '0' && $_SESSION['validNacimiento'] = '0')
    {
        mysqli_query($conexion,"INSERT INTO visitantes (Nombre, Telefono, Fecha_nac, IDNacion, fecha_llegada, hora_llegada, cita_consulado, fecha_registro) 
        VALUES ('$nombres','$apellidos','$telefono','$nacimiento','$nacionalidad','$fechaLlegada','$horaLlegada','$citaConsulado','$fecha_registro')")
        or die(header("location:edit-profile.php?id=$ID"));

        $_SESSION['datosMigrant'] = '1';
        header("location:addManualMigrant.php");
    }else
    {
        $_SESSION['datosMigrant'] = '0';
        header("location:addManualMigrant.php");
    }
?>