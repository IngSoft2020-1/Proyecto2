<?php
    $var = "12:00 PM";
    $tiempo = substr($var, 0, 5);
    $cosa = $tiempo.":"."00";
    // $horall = strtotime('H:i:s', $cosa);
    $horall = date('H:i:s', $cosa);

    // echo ($horall);
?>