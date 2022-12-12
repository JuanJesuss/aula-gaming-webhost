<?php
    session_start();
    if(isset($_SESSION['email'])){
        $anio= date('Y');
        require_once("../views/mi-perfil.php");
    }
    else
        header("location: controller-sesion.php");
?>