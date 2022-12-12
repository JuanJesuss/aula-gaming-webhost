<?php
    if(isset($_POST['iniciar-sesion'])){
        require_once("../models/funciones-iniciar-sesion.php");
        $db= conexion();
        $fila= obtener_datos($_POST['email'], $db);
        $row= mysqli_fetch_assoc($fila);
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellidos'] = $row['apellidos'];
        $_SESSION['alias'] = $row['alias'];
        $_SESSION['turno'] = $row['turno'];
        header("location: controller-bienvenido.php");                
    }
    $anio= date('Y');
    require_once("../views/iniciar-sesion.php");
?>