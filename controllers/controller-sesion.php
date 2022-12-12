<?php
    require_once("../models/funciones-iniciar-sesion.php");
    $db= conexion();
    if(isset($_POST['iniciar-sesion'])){
        if(empty($_POST['email']))
            echo "Introduzca email.";
        elseif(empty($_POST['password']))
            echo "Introduzca contraseña.";
        else{
            $fila= obtener_datos($_POST['email'], $db);
            if(mysqli_num_rows($fila)==0)
                echo "Email no registrado.";
            else{
                $row= mysqli_fetch_assoc($fila);
                if(md5($_POST['password'])==$row['password']){
                    session_start();
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['alias'] = $row['alias'];
                    $_SESSION['turno'] = $row['turno'];
                    header("location: controller-bienvenido.php");
                }
                else
                    echo "Password incorrecto.";
            }           
        }            
    }
    require_once("../views/iniciar-sesion.php");
?>