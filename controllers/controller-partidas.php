<?php
    session_start();
    if(isset($_SESSION['email'])){
        require_once("../models/funciones-partidas.php");
        $db= conexion();   
        if(isset($_POST['partidas'])){
            if(!empty($_POST['desde']) && !empty($_POST['hasta']) && ($_POST['desde']<=$_POST['hasta']))
                $fila= ver_partidas($_SESSION['turno'], $_POST['desde'], $_POST['hasta'], $db);
        }
        $anio= date('Y');
        require_once("../views/partidas.php");
    }
    else
        header("location: controller-sesion.php");
?>