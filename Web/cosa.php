<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Editar</title>
    </head>
    <body>
        <?php
        // fecha 1
        $fecha_dada= "2020-06-20";
        // fecha actual
        $fecha_actual= date("Y-m-d");

        $wea = dias_pasados($fecha_dada,$fecha_actual);
        echo ($wea);

        function dias_pasados($fecha_inicial,$fecha_final)
        {
            $dias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
            $dias = abs($dias); 
            $dias = floor($dias);
            return $dias;
        }
        ?>
    <body>
    <script type="text/javascript" src="js/cosa.js"></script>
</html>