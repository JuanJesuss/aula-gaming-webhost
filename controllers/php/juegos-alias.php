<?php
	require_once("../../models/funciones-eliminar-partida.php");
    $db= conexion();
    $fecha= date('Y-m-d');
    $fila= juegos($fecha, $_POST["ali"], $db);
    $juegos= array();
    while($row= mysqli_fetch_assoc($fila)){
        array_push($juegos, $row['juego']);
    }
    $respuesta= json_encode($juegos);
    echo $respuesta;
?>