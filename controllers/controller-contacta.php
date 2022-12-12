<?php
    session_start();
    if(isset($_SESSION['email'])){
        $anio= date('Y');
        require_once("../views/contacta-sesion-iniciada.php");
    }
    else{
        $anio= date('Y');
        require_once("../views/contacta.php");
    }
?>