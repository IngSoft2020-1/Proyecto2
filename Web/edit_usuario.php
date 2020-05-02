<?php
/*Llamado de _edit.php*/
/*Hace update de los datos que se modificaron*/
    session_start();
    $_SESSION['listo'] = '0';
    $ID = $_GET['var2'];
    $nombre = $_REQUEST['usuario'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['correo1'];
    $contrasena = $_REQUEST['contrasena1'];

    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    if(filter_var($correo, FILTER_VALIDATE_EMAIL) && strlen($contrasena) > 7)
    {
        mysqli_query($conexion,"update usuario set 
            Nombre='$nombre',
            Apellidos='$apellido',
            Clave='$contrasena',
            Correo= '$correo',
            TipoUsuario='A'
            where ID=$ID")
        or die(header("location:edit.php"));
        
        mysqli_close($conexion); 

        $_SESSION['listo'] = '1';
        header("location:edit.php");
    }
    else
    {
        $_SESSION['listo'] = '0';
        header("location:edit.php");
    }
?>
