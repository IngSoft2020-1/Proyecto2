<?php
/*Llamado de register.php*/
/*Inserta un nuevo usuario en la base de datos*/
    require 'conexion.php';
    session_start();
    $_SESSION['creado'] = '0';
    $_SESSION['contra'] = '0';
    $_SESSION['corr'] = '0';
    $_SESSION['val1'] = '0'; /*Formato nombre*/
    $_SESSION['val2'] = '0'; /*Formato Apellidos*/
    $_SESSION['val3'] = '0'; /*Formato correo*/
    $_SESSION['val4'] = '0'; /*Formato confirmar correo*/
    $_SESSION['val5'] = '0'; /*Formato contrasena*/
    $_SESSION['val6'] = '0'; /*Formato confirmar contrasena*/
    $_SESSION['val7'] = '0'; /*Formato telefono*/
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo1 = $_REQUEST['correo1'];    
    $correo2 = $_REQUEST['correo2'];
    $contrasena1 = $_REQUEST['contrasena1'];
    $contrasena2 = $_REQUEST['contrasena2'];
    $telefono = $_REQUEST['telefono'];
    $_SESSION['lucky'] = '';
    $_SESSION['charms'] = '';
    $_SESSION['choco'] = '';
    $_SESSION['krispis'] = '';
    $_SESSION['sucaritas'] = '';

    if($nombre == '')
    {
        $_SESSION['val1'] = '1'; /*Formato nombre*/
    }
    
    if($apellidos == '')
    {
        $_SESSION['val2'] = '1'; /*Formato Apellidos*/
    } 
    
    if(filter_var($correo1, FILTER_VALIDATE_EMAIL))
    {}
    else
    {
        $_SESSION['val3'] = '1'; /*Formato correo*/
    }
    
    if(filter_var($correo2, FILTER_VALIDATE_EMAIL))
    {}
    else
    {
        $_SESSION['val4'] = '1'; /*Formato confirmar correo*/
    }
    
    if($correo1 != $correo2)
    {
        $_SESSION['corr'] = '1';
    }
    
    if(strlen($contrasena1) < 4 || !preg_match('`[a-zA-Z]`',$contrasena1) || !preg_match('`[0-9]`',$contrasena1))
    {
        $_SESSION['val5'] = '1'; /*Formato contrasena*/
    }
    
    if(strlen($contrasena2) < 4 || !preg_match('`[a-zA-Z]`',$contrasena2) || !preg_match('`[0-9]`',$contrasena2))
    {
        $_SESSION['val6'] = '1'; /*Formato confirmar contrasena*/
    }

    if(strlen($contrasena1 != $contrasena2))
    {
        $_SESSION['contra'] = '1';
    }
    
    
    
    if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $telefono))
    {}
    else
    {
        $_SESSION['val7'] = '1';
    }
     
    
    if ($_SESSION['val1'] == '0' && $_SESSION['val2'] == '0' && $_SESSION['val3'] == '0' && $_SESSION['val4'] == '0' && $_SESSION['val5'] == '0'
    && $_SESSION['val6'] == '0' && $_SESSION['val7'] == '0' && $_SESSION['corr'] == '0' && $_SESSION['contra'] == '0')
    {
        $registros=mysqli_query($conexion,"select ID
                                from usuario where Correo='$correo1'") or
        die("Problemas en el select:".mysqli_error($conexion));
        $resultado = mysqli_num_rows($registros);

        if($resultado > 0)
        {
            $_SESSION['creado'] = '2'; /*Usuario ya existe*/
            mysqli_free_result($registros);
            mysqli_close($conexion);
            header("location:new.php");
        }
        else{
            mysqli_query($conexion,"insert into usuario(Nombre,Apellidos,Clave,Correo,Telefono,TipoUsuario) values
                        ('$nombre','$apellidos','$contrasena1','$correo1','$telefono','A')")
            or die("Problemas en el select".mysqli_error($conexion));

            $_SESSION['creado'] = '1'; /*Usuario registrado*/
        }
        mysqli_free_result($registros);
        mysqli_close($conexion);
    }
    else
    {
        list($uno,$dos,$tres) = explode("-",$telefono);
        $edy = $uno.$dos.$tres;
        $_SESSION['lucky'] = $nombre;
        $_SESSION['charms'] = $apellidos;
        $_SESSION['choco'] = $contrasena1;
        $_SESSION['krispis'] = $correo1;
        $_SESSION['sucaritas'] = $edy;
    }
    header("location:new.php");
?>
