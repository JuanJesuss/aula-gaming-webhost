<?php
	require_once("../../models/funciones-registro.php");
    $db= conexion();
    $fila= obtener_todos_alias($db);
    $todos_alias= array();
    while($row= mysqli_fetch_assoc($fila)){
        array_push($todos_alias, $row['alias']);
    }
    $respuesta= json_encode($todos_alias);
    echo $respuesta;
?>