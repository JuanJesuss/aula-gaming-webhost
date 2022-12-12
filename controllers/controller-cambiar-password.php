<?php
    session_start();
    if(isset($_SESSION['email'])){
        $anio= date('Y');
        require_once("../views/cambiar-password.php");
        require_once("../models/funciones-cambiar-password.php");
        $db= conexion();
        if(isset($_POST['cambiar'])){
            if(cambiar_contrasenia($_POST['email'], md5($_POST['nuevacontrasena']), $db))
                echo "<div class=doce id=doce>Se cambió la contraseña con éxito.</div>";
        }
    }
    else
        header("location: controller-sesion.php");
?>