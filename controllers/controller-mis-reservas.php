<?php
    session_start();
    if(isset($_SESSION['email'])){
        require_once("../models/funciones-mis-reservas.php");
        $db= conexion();
        if(isset($_POST['misreservas'])){
            if(!empty($_POST['desde']) && !empty($_POST['hasta']) && $_POST['desde']<=$_POST['hasta'])
                $fila= mis_reservas($_SESSION['email'], $_POST['desde'], $_POST['hasta'], $db);
        }
        $anio= date('Y');
        require_once("../views/mis-reservas.php");
    }
    else
        header("location: controller-sesion.php");
?>