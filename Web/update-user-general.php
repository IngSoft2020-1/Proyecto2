<?php
/*Llamado de edit-profile.php*/
/*Hace update de los datos que se modificaron*/
    require 'conexion.php';
    session_start();
    $patronNombre = '/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u';

    $ID = $_GET['id'];
    $nombres = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $correo1 = $_REQUEST['correo1'];
    $correo2 = $_REQUEST['correo2'];
    $telefono = $_REQUEST['telefono'];
    $_SESSION['validNombres'] = '0';
    $_SESSION['validApelllidos'] = '0';
    $_SESSION['validCorreo'] = '0';
    $_SESSION['validTelefono'] = '0';

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

    /* CONSULTA PARA VER SI CORREO YA EXISTE */
    $registros=mysqli_query($conexion,"SELECT ID FROM usuario WHERE Correo='$correo1' AND ID!='$ID'");
    $resultado = mysqli_num_rows($registros);

    /* VALIDACIONES CAMPO CORREO */
    if($correo1 == '')//ESTA VACIO
    {
        $_SESSION['validCorreo'] = '1';
    } 
    else if(strlen($correo1)>100)//MUY LARGO
    {
        $_SESSION['validCorreo'] = '2';
    }
    else if(!filter_var($correo2, FILTER_VALIDATE_EMAIL))//FORMATO CORREO
    {
        $_SESSION['validCorreo'] = '3';
    }
    else if($resultado>0)//MISMO CORREO
    {
        $_SESSION['validCorreo'] = '4';
    }
    else if(!$correo1==$correo2)//CORREO YA EXISTENTE
    {
        $_SESSION['validCorreo'] = '5';
    }
    

    /* VALIDACIONES CAMPO TELEFONO */
    if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $telefono))//FORMATO CORREO
    {
        $_SESSION['validTelefono'] = '1';
    }

    /* UPDATE DEL LOS DATOS GENERALES DEL USUARIO */
    if ($_SESSION['validNombres'] == '0' && $_SESSION['validApelllidos'] == '0' && $_SESSION['validCorreo'] == '0' && $_SESSION['validTelefono'] == '0')
    {
        mysqli_query($conexion,"update usuario set 
            Nombre='$nombres',
            Apellidos='$apellidos',
            Correo= '$correo1',
            Telefono= '$telefono'
            where ID=$ID")
        or die(header("location:_edit.php?var=$ID"));

        $_SESSION['datos'] = '1';
        header("location:_edit.php?var=$ID");
    }else
    {
        $_SESSION['datos'] = '0';
        header("location:_edit.php?var=$ID");
    }
    
?>
