<?php
    $anio= date('Y');
    require_once("../views/crear-nueva-contrasena.php");
    if(isset($_POST['enviar'])){
        require_once("../models/funciones-crear-nueva-contrasena.php");
        $db= conexion();
        if(guardar($_POST['email'], md5($_POST['contra']), $db))
            echo "<div class=diez id=diez>Nueva contraseña creada con éxito.</div>";
    }
?>