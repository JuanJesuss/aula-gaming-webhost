<?php
	require_once("../../models/funciones-modo-registrador.php");
    $db= conexion();
    $fila= comprobar_reserva($_POST["fecha"], $_POST["email"], $db);
    if(mysqli_num_rows($fila)==0)
        $reserva= "no";
    else
        $reserva= "si";
    $respuesta= json_encode($reserva);
    echo $respuesta;
?>