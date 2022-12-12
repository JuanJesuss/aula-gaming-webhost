<?php
    session_start();
    if(isset($_SESSION['email'])){
        $anio= date('Y');
        require_once("../views/bienvenido.php");
    }
    else
        header("location: controller-sesion.php");
?>