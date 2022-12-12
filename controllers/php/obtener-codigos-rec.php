<?php
    require_once("../../models/funciones-crear-nueva-contrasena.php");
    $db= conexion();
    $fila= obtener_codigos_rec($db);
    $codigos= array();
    while($row= mysqli_fetch_assoc($fila)){
        array_push($codigos, $row['codigo_recuperacion_password']);
    }
    $respuesta= json_encode($codigos);
    echo $respuesta;
?>