<?php
    session_start();
    error_reporting(0);
    $patronNombre = '/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u';

    $nombres = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $telefono = $_REQUEST['telefono'];
    $nacionalidad = $_REQUEST['nacionalidad'];
    $citaConsulado = $_REQUEST['citaConsulado'];
    $horaLlegada = $_REQUEST['horaLlegada'];
    $fechaLlegada = $_REQUEST['fechaLlegada'];
    $nacimiento = $_REQUEST['nacimiento'];

    $_SESSION['validNombres'] = '0';
    $_SESSION['validApelllidos'] = '0';
    $_SESSION['validTelefono'] = '0';
    $_SESSION['validNacion'] = '0';
    $_SESSION["validCita"]='0';
    $_SESSION['validHoraLlegada']='0';
    $_SESSION['validFechaLlegada']='0';
    $_SESSION['validNacimiento']='0';
    $_SESSION['sePudo'] = '0';

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

    /* VALIDACIONES CAMPO TELEFONO */
    if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $telefono))//FORMATO CORREO
    {
        $_SESSION['validTelefono'] = '1';
    }

    /* VALIDACIONES CAMPO NACION*/
    if($nacionalidad == '')//ESTA VACIO
    {
        $_SESSION['validNacion'] = '1';
    }
    else if(strlen($nacionalidad) != 3)
    {
        $_SESSION['validNacion'] = '2';
    }

    /* VALIDACIONES CAMPO CITA*/
    if($citaConsulado == '')//ESTA VACIO
    {
        $_SESSION['validCita'] = '1';
    }

    /* VALIDACIONES CAMPO HORALLEGADA*/
    if($horaLlegada == '')//ESTA VACIO
    {
        $_SESSION['validHoraLlegada'] = '1';
    }

    /* VALIDACIONES CAMPO FECHALLEGADA*/
    if($fechaLlegada == 'Presiona aquí')//ESTA VACIO
    {
        $_SESSION['validFechaLlegada'] = '1';
    }

    /* VALIDACIONES CAMPO NACIMIENTO0*/
    if($nacimiento == 'Presiona aquí')//ESTA VACIO
    {
        $_SESSION['validNacimiento'] = '1';
    }

    /* UPDATE DEL LOS DATOS GENERALES DEL USUARIO */
    if ($_SESSION['validNombres'] == '0' && $_SESSION['validApelllidos'] == '0' && $_SESSION['validTelefono'] == '0' && $_SESSION['validNacion'] == '0'
    && $_SESSION['validCita'] == '0' && $_SESSION['validHoraLlegada'] == '0' && $_SESSION['validFechaLlegada'] == '0' && $_SESSION['validNacimiento'] == '0')
    {

        $ano = substr($fechaLlegada, 6, 4); 
        $mes = substr($fechaLlegada, 0, 2); 
        $dia = substr($fechaLlegada, 3, 2); 
        $cosa = $ano."-".$mes."-".$dia;
        $trans = strtotime($cosa);
        $fechall = date('Y-m-d', $trans);

        $ano = substr($nacimiento, 6, 4); 
        $mes = substr($nacimiento, 0, 2); 
        $dia = substr($nacimiento, 3, 2); 
        $cosa = $ano."-".$mes."-".$dia;
        $trans = strtotime($cosa);
        $fechana = date('Y-m-d', $trans);

        //G:i:s
        $trans = strtotime($horaLlegada);
        $horall = date('G:i:s', $trans);

        //G:i:s
        $trans = strtotime($citaConsulado);
        $citaco = date('G:i:s', $trans);

        $nombres = $nombres." ".$apellidos;
        $fecha_registro = date("Y-m-d G:i:s");


        $conexion=mysqli_connect("localhost","root","","derechoscopio") or
        die("Problemas con la conexión");

        $registros=mysqli_query($conexion,"select Nombre
                                from visitante where Nombre='$nombres' and Telefono='$telefono' and Fecha_nac='$fechana' and IDNacion='$nacionalidad' and fecha_llegada='$fechall' and hora_llegada='$horall' and cita_consulado='$citaco'") or
        die("Problemas en el select:".mysqli_error($conexion));
        $resultado = mysqli_num_rows($registros);


        if($resultado > 0)
        {
            $_SESSION['sePudo'] = '1';
        }
        else
        {
            mysqli_query($conexion,"insert into visitante(Nombre,Telefono,Fecha_nac,IDNacion,fecha_llegada,hora_llegada,cita_consulado,fecha_registro) values
            ('$nombres','$telefono','$fechana','$nacionalidad','$fechall','$horall','$citaco','$fecha_registro')")
            or die("Problemas en el select".mysqli_error($conexion));
            
            mysqli_free_result($registros);
            mysqli_close($conexion);

            $_SESSION['sePudo'] = '2';
        }
    }   
    header("location:addManualMigrant.php");
?>
