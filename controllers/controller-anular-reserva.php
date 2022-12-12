<?php
    session_start();
    if(isset($_SESSION['email'])){
        require_once("../models/funciones-anular-reserva.php");
        $db= conexion();
        if(isset($_POST['anular'])){
            if(!empty($_POST['reservas'])){
                $fec_es= DateTime::createFromFormat('d/m/Y', $_POST['reservas']);
                $fec_in= $fec_es->format('Y-m-d');
                $fila3= obtener_datos_reserva($fec_in, $_SESSION['email'], $db);
                anular($fec_in, $_SESSION['email'], $db);
            }
        }
        $fila= obtener_reservas($_SESSION['email'], $db);
        $reservas= array();
        while($row = mysqli_fetch_assoc($fila)) {
            array_push($reservas, date("d/m/Y", strtotime($row['fecha'])));
        }
        $anio= date('Y');
        require_once("../views/anular-reserva.php");
    }
    else
        header("location: controller-sesion.php");
?>