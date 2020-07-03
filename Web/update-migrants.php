<?php
    session_start();
    $patronNombre = '/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u';
    $ID = $_POST['ID'];
    $fechal = $_POST['fechal'];
    $nomb = $_POST['nomb'];
    $fechan = $_POST['fechan'];
    $horal = $_POST['horal'];
    $citac = $_POST['citac'];
    $tele = $_POST['tele'];
    $naci = $_POST['naci'];        

    if($ID != '' && $fechal != '' && strlen($fechal) == 10 && $nomb != '' && $fechan != '' && strlen($fechan) == 10 && $horal != '' && strlen($horal) == 8 && 
    $citac != '' && strlen($citac) == 8 && $naci != '' && $tele != '' && strlen($tele) == 12)
    {
        $conexion=mysqli_connect("localhost","root","","derechoscopio") or
        die("Problemas con la conexión");

        $ano = substr($fechal, 6, 4); 
        $mes = substr($fechal, 0, 2); 
        $dia = substr($fechal, 3, 2); 
        $cosa = $ano."-".$mes."-".$dia;
        $trans = strtotime($cosa);
        $fechall = date('Y-m-d', $trans);

        $ano = substr($fechan, 6, 4); 
        $mes = substr($fechan, 0, 2); 
        $dia = substr($fechan, 3, 2); 
        $cosa = $ano."-".$mes."-".$dia;
        $trans = strtotime($cosa);
        $fechana = date('Y-m-d', $trans);

        //G:i:s
        $trans = strtotime($horal);
        $horall = date('G:i:s', $trans);

        //G:i:s
        $trans = strtotime($citac);
        $citaco = date('G:i:s', $trans);


        // mysqli_query($conexion,"update visitante set Nombre='KKkkkkkkkkkkkkkkkkkkkkk' where IDVisi=$ID")
        //     or die();
         mysqli_query($conexion,"update visitante set Nombre='$nomb', Telefono='$tele', Fecha_nac='$fechana', IDNacion='$naci', fecha_llegada='$fechall', hora_llegada='$horall', cita_consulado='$citaco' where IDVisi=$ID")
            or die();
    }
?>