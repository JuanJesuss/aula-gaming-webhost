<?php
    session_start();
    if(isset($_SESSION['email'])){
        require_once("../models/funciones-eliminar-partida.php");
        $db= conexion();
        $fecha= date('Y-m-d');
        $alias= todos_alias($fecha, $_SESSION['turno'], $db);
        $todos_alias= array();
        while($row = mysqli_fetch_assoc($alias)){
            array_push($todos_alias, $row['alias']);
        }
        $anio= date('Y');
        require_once("../views/eliminar-partida.php");
        if(isset($_POST['eliminar'])){
            if(empty($_POST['alias']))
                echo "<span class=trece>Seleccione alias.</span>";
            elseif(empty($_POST['juego']))
                echo "<span class=trece>Seleccione juego.</span>";
            else{
                $fila= obtener_datos($fecha, $_POST['alias'], $_POST['juego'], $db);
                $row2 = mysqli_fetch_assoc($fila);
                if(borrar_partida($fecha, $_POST['alias'], $_POST['juego'], $db))
                    echo "<p class=quince>Partida borrada con éxito:</p><p class=dieciseis>- Id partida: ".$row2['id']."</br>- Fecha: ".$fecha."<br/>- Juego: ".$_POST['juego']."<br/>- Puesto: ".$row2['posicion']."<br/>- Alias: ".$_POST['alias']."</p>";
            }
        }
    }
    else
        header("location: controller-sesion.php");
?>