<?php
	require_once("../../models/funciones-iniciar-sesion.php");
    $db= conexion();
    $fila= obtener_passwords($db);
    $passwords= array();
    while($row= mysqli_fetch_assoc($fila)){
        array_push($passwords, $row['password']);
    }
    $respuesta= json_encode($passwords);
    echo $respuesta;
?>