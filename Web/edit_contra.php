<?php
/*Llamado de _edit.php*/
/*Hace update de los datos que se modificaron*/
    require 'conexion.php';
    session_start();
    $_SESSION['listo'] = '0';
    $_SESSION['contras'] = '0';
    $ID = $_GET['var2'];
    $contras1 = $_REQUEST['contras1'];
    $contras2 = $_REQUEST['contras2'];
    $_SESSION['valll1'] = '0'; /*Formato contra1*/
    $_SESSION['valll2'] = '0'; /*Formato contra2*/

    if($contras1 < 4)
    {
        $_SESSION['valll1'] = '1'; /*Formato contra1*/
    }

    if($contras2 < 4)
    {
        $_SESSION['valll2'] = '1'; /*Formato contra2*/
    }
    
    if($contras1 != $contras2)
    {
        $_SESSION['contras'] = '1';
    }   

    if ($_SESSION['valll1'] == '0' && $_SESSION['valll2'] == '0' && $_SESSION['contras'] == '0')
    {
    
        mysqli_query($conexion,"update usuario set 
            Clave='$contras1'  
            where ID=$ID")
        or die(header("location:_edit.php?var=$ID"));
        
        mysqli_close($conexion); 

        $_SESSION['listo'] = '1';
        header("location:_edit.php?var=$ID");
    }

    header("location:_edit.php?var=$ID");
?>
