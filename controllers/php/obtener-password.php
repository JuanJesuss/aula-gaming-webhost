<?php
    require_once("../../models/funciones-cambiar-password.php");
    $db= conexion();
    $fila= obtener_password($_POST["correo"], $db);
    $row= mysqli_fetch_assoc($fila);
    $respuesta= json_encode($row['password']);
    echo $respuesta;
?>