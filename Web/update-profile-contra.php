<?php
/*Llamado de edit-profile.php*/
/*Hace update de los datos que se modificaron*/
    session_start();
    $ID = $_GET['id'];

    $contra1 = $_REQUEST['contra1'];
    $contra2 = $_REQUEST['contra2'];

    $_SESSION['validContra'] = '0';

    /* VALIDACIONES CAMPO CONTRAÑESA */

    if(strlen($contra1) < 4)//LARGO MINIMO
    {
        $_SESSION['validContra'] = '1';
    } 
    else if(!preg_match('~[a-zA-Z]~',$contra1))//CONTENER UNA LETRA
    {
        $_SESSION['validContra'] = '1';
    }
    else if(!preg_match('~\d~',$contra1))//CONTENER UN DIGITO
    {
        $_SESSION['validContra'] = '1';
    }
    else if($contra1 != $contra2)//IGUALES
    {
        $_SESSION['validContra'] = '1';
    }

    /* UPDATE DE LA CONTRASEÑA */
    if ($_SESSION['validContra'] == '0')
    {
        $conexion=mysqli_connect("localhost","root","","derechoscopio") or
        die("Problemas con la conexión");
    
        mysqli_query($conexion,"UPDATE usuario SET 
            Clave='$contra1'
            WHERE ID=$ID")
        or die(header("location:edit-profile.php?id=$ID"));

        $_SESSION['contra'] = '1';
        header("location:edit-profile.php?id=$ID");
    }
    else
    {
        $_SESSION['contra'] = '0';
        header("location:edit-profile.php?id=$ID");
    }
    
?>
