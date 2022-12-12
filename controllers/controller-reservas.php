<?php
    session_start();
    if(isset($_SESSION['email'])){
        require_once("../models/funciones-reservas.php");
        $db= conexion();
        if(isset($_POST['reservas'])){
            if(!empty($_POST['desde']) && !empty($_POST['hasta']) && $_POST['desde']<=$_POST['hasta'])
                $fila= ver_reservas($_POST['desde'], $_POST['hasta'], $_SESSION['turno'], $db);
        }
        $anio= date('Y');
        require_once("../views/reservas.php");
    }
    else
        header("location: controller-sesion.php");
?>