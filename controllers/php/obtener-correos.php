<?php
	require_once("../../models/funciones-registro.php");
    $db= conexion();
    $fila= obtener_correos($db);
    $correos= array();
    while($row= mysqli_fetch_assoc($fila)){
        array_push($correos, $row['email']);
    }
    $respuesta= json_encode($correos);
    echo $respuesta;
?>