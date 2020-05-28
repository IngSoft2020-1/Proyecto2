<?php
/*Llamado de _edit.php*/
/*Hace update de los datos que se modificaron*/
    session_start();
    $_SESSION['listo'] = '0';
    $_SESSION['corre'] = '0';
    $_SESSION['contra'] = '0';
    $ID = $_GET['var2'];
    $nombre = $_REQUEST['usuario'];
    $apellido = $_REQUEST['apellido'];
    $correo1 = $_REQUEST['correo1'];
    $correo2 = $_REQUEST['correo2'];
    $contra1 = $_REQUEST['contra1'];
    $contra2 = $_REQUEST['contra2'];
    $telefono = $_REQUEST['telefono'];
    $_SESSION['vall1'] = '0'; /*Formato nombre*/
    $_SESSION['vall2'] = '0'; /*Formato Apellidos*/
    $_SESSION['vall3'] = '0'; /*Formato correo*/
    $_SESSION['vall4'] = '0'; /*Formato confirmar correo*/
    $_SESSION['vall5'] = '0'; /*Formato telefono*/
    $_SESSION['vall6'] = '0'; /*Formato contrasena*/
    $_SESSION['vall7'] = '0'; /*Formato confirmar contrasena*/

    if($nombre == '')
    {
        $_SESSION['vall1'] = '1'; /*Formato nombre*/
    }
    
    if($apellido == '')
    {
        $_SESSION['vall2'] = '1'; /*Formato Apellidos*/
    } 
    
    if(filter_var($correo1, FILTER_VALIDATE_EMAIL))
    {}
    else
    {
        $_SESSION['vall3'] = '1'; /*Formato correo*/
    }
    
    if(filter_var($correo2, FILTER_VALIDATE_EMAIL))
    {}
    else
    {
        $_SESSION['vall4'] = '1'; /*Formato confirmar correo*/
    }
    
    if($correo1 != $correo2)
    {
        $_SESSION['corre'] = '1';
    }
    
    if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $telefono))
    {}
    else
    {
        $_SESSION['vall5'] = '1'; /*Formato telefono*/
    }
    
    if(strlen($contra1) < 4)
    {
        $_SESSION['vall6'] = '1'; 
    }
    
    if(strlen($contra2) < 4)
    {
        $_SESSION['vall7'] = '1'; 
    }

    if($contra1 != $contra2)
    {
        $_SESSION['contra'] = '1';
    }

    if ($_SESSION['vall1'] == '0' && $_SESSION['vall2'] == '0' && $_SESSION['vall3'] == '0' && $_SESSION['vall4'] == '0' && $_SESSION['vall5'] == '0' 
    && $_SESSION['vall6'] == '0' && $_SESSION['vall7'] == '0' && $_SESSION['corre'] == '0' && $_SESSION['contra'] == '0')
    {
        $conexion=mysqli_connect("localhost","root","","derechoscopio") or
        die("Problemas con la conexión");
    
        mysqli_query($conexion,"update usuario set 
            Nombre='$nombre',
            Apellidos='$apellido',
            Correo= '$correo1',
            Telefono= '$telefono',
            Clave= '$contra1' 
            where ID=$ID")
        or die(header("location:_edit.php?var=$ID"));
        
        mysqli_close($conexion); 

        $_SESSION['listo'] = '1';
        header("location:_edit.php?var=$ID");
    }

    header("location:_edit.php?var=$ID");
?>
