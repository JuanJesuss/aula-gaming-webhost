<?php
	require_once("../../models/funciones-modo-registrador.php");
    $db= conexion();
    $fila= registrador($_POST["fecha"], $_POST["turno"], $db);
    $registrador= array();
    while($row= mysqli_fetch_assoc($fila)){
        array_push($registrador, $row['registrador']);
    }
    $respuesta= json_encode($registrador);
    echo $respuesta;
?>