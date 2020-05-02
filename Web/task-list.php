<?php
    $conexion=mysqli_connect("localhost","root","","derechoscopio") or
    die("Problemas con la conexión");

    $query = "select usuario.ID, usuario.Nombre, Apellidos, Correo, Telefono, tipousuario.Nombre as 'TipoUsuario' from usuario inner join 
    tipousuario on usuario.TipoUsuario = tipousuario.ID where TipoUsuario in ('A','R') order by ID asc";
    $resultado = mysqli_query($conexion, $query);

    if(!$resultado) {
        die('Error'.mysqli_error($conexion));
    }

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'ID' => $row['ID'],
            'Nombre' => $row['Nombre'],
            'Apellidos' => $row['Apellidos'],
            'Correo' => $row['Correo'],
            'Telefono' => $row['Telefono'],
            'TipoUsuario' => $row['TipoUsuario']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>