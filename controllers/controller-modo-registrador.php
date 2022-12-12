<?php
    session_start();
    if(isset($_SESSION['email'])){
        require_once("../models/funciones-modo-registrador.php");
        $db= conexion();
        $fecha= date('Y-m-d');
        if(isset($_POST['modoregistrador'])){
            asignar_registrador($fecha, $_SESSION['email'], $db);
        }
        $fila= correo_registrador($fecha, $_SESSION['turno'], $db);
        $anio= date('Y');
        require_once("../views/modo-registrador.php");
    }
    else
        header("location: controller-sesion.php");
?>