<?php
    session_start();
    if(isset($_SESSION['email'])){
        $anio= date('Y');
        require_once("../views/alta-juego.php");
        if(isset($_POST['altajuego'])){
            require_once("../models/funciones-alta-juego.php");
            $db= conexion();
            if(empty($_POST['nombrejuego']))
                echo "<span class=once>Introduzca el nombre del juego a dar de alta.</span>";
            else{
                if(!validar_juego($_POST['nombrejuego']))
                    echo "<span class=once>El nombre del juego debe tener entre 3 y 50 caracteres.</span>";
                else{
                    $ids= obtener_id_todos_juegos($db);
                    $mayor= 0;
                    $ids_juegos= array();
                    while($row= mysqli_fetch_assoc($ids)){
                        if(intval($row['id'])>$mayor)
                            $mayor= intval($row['id']);
                    }
                    $fecha= date('Y-m-d');
                    $ids_hoy= obtener_id_juegos_hoy($fecha, $db);
                    if(mysqli_num_rows($ids_hoy)==0){
                        if(alta_juego(($mayor+1), strtolower(eliminar_tildes(trim($_POST['nombrejuego']))), $fecha, $db))
                            echo "<p class=trece>Juego dado de alta con éxito:<p/><p class=catorce>- Id juego: ".($mayor+1)."<br/>- Juego: ".strtolower(eliminar_tildes(trim($_POST['nombrejuego'])))."<br/>- Fecha alta: ".date("d/m/Y", strtotime($fecha))."</p>";
                    }
                    elseif(mysqli_num_rows($ids_hoy)==5)
                        echo "<span class=once>Solo se puede dar de alta un máximo de 5 juegos por día.</span>";
                    else{
                        $fila= obtener_juegos($db);
                        $juegos= array();
                        while($row = mysqli_fetch_assoc($fila)){
                            array_push($juegos, $row['juego']);
                        }
                        if(in_array(strtolower(eliminar_tildes(trim($_POST['nombrejuego']))), $juegos))
                            echo "<span class=once>El juego ".eliminar_tildes(trim($_POST['nombrejuego']))." ya ha sido dado de alta el día de hoy.</span>";
                        else{
                            if(alta_juego(($mayor+1), strtolower(eliminar_tildes(trim($_POST['nombrejuego']))), $fecha, $db))
                                echo "<p class=trece>Juego dado de alta con éxito:<p/><p class=catorce>- Id juego: ".($mayor+1)."<br/>- Juego: ".strtolower(eliminar_tildes(trim($_POST['nombrejuego'])))."<br/>- Fecha alta: ".date("d/m/Y", strtotime($fecha))."</p>";
                        }
                    } 
                }
            }
        }
    }
    else
        header("location: controller-sesion.php");
