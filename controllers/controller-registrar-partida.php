<?php
    session_start();
    if(isset($_SESSION['email'])){
        require_once("../models/funciones-registrar-partida.php");
        $db= conexion();
        $fecha= date('Y-m-d');
        $alias= todos_alias($fecha, $_SESSION['turno'], $db);
        $todos_alias= array();
        while($row = mysqli_fetch_assoc($alias)){
            array_push($todos_alias, $row['alias']);
        }
        $juegos_alta_hoy= juegos_alta_hoy($fecha, $db);
        $juegos_hoy= array();
        while($row = mysqli_fetch_assoc($juegos_alta_hoy)){
            array_push($juegos_hoy, $row['juego']);
        }
        $anio= date('Y');
        require_once("../views/registrar-partida.php");
        if(isset($_POST['registrar'])){
            if(empty($_POST['alias']))
                echo "<span class=once>Seleccione el alias del usuario.</span>";
            elseif(empty($_POST['juego']))
                echo "<span class=once>Seleccione el juego que jugó el usuario.</span>";
            elseif(empty($_POST['puesto']))
                echo "<span class=once>Seleccione en que puesto quedó el usuario.</span>";
            else{
                $fila= comprobar_juego($_POST['alias'], $fecha, $db);
                $juegos= array();
                while($row = mysqli_fetch_assoc($fila)){
                    array_push($juegos, $row['juego']);
                }
                if(in_array($_POST['juego'], $juegos))
                    echo "<span class=once>".$_POST['alias']." ya ha registrado una partida del juego ".$_POST['juego']." en el día de hoy.</span>";
                else{
                    $fila2= obtener_datos($_POST['alias'], $db);
                    $row2 = mysqli_fetch_assoc($fila2);
                    $ids= id_partidas($db);
                    $mayor= 0;
                    while($row3= mysqli_fetch_assoc($ids)){
                        if(intval($row3['id'])>$mayor)
                            $mayor= intval($row3['id']);
                    }
                    $fila3= puestos($_POST['juego'], $fecha, $_SESSION['turno'], $db);
                    if(mysqli_num_rows($fila3)==0){
                        if(guardar(($mayor+1), $fecha, $_POST['juego'], $_POST['puesto'], $_POST['alias'], $_SESSION['turno'], $row2['email'], $row2['nombre'], $row2['apellidos'], $db))
                            echo "<p class=doce>Partida registrada con éxito:</p><p class=trece>- Id partida: ".($mayor+1)."<br/>- Alias: ".$_POST['alias']."<br/>- Juego: ".$_POST['juego']."<br/>- Puesto: ".$_POST['puesto']."<br/>- Fecha: ".date("d/m/Y", strtotime($fecha))."</p>";    
                    }
                    else{
                        $posiciones= array();
                        while($row4= mysqli_fetch_assoc($fila3)){
                            array_push($posiciones, $row4['posicion']);
                        }
                        if(in_array($_POST['puesto'], $posiciones))
                            echo "<span class=once>El puesto ".$_POST['puesto']." del juego ".$_POST['juego']." ya lo ocupa un usuario.</span>";
                        else{
                            if(guardar(($mayor+1), $fecha, $_POST['juego'], $_POST['puesto'], $_POST['alias'], $_SESSION['turno'], $row2['email'], $row2['nombre'], $row2['apellidos'], $db))
                                echo "<p class=doce>Partida registrada con éxito:</p><p class=trece>- Id partida: ".($mayor+1)."<br/>- Alias: ".$_POST['alias']."<br/>- Juego: ".$_POST['juego']."<br/>- Puesto: ".$_POST['puesto']."<br/>- Fecha: ".date("d/m/Y", strtotime($fecha))."</p>";    
                        }
                    }
                }
            }  
        }
    }
    else
        header("location: controller-sesion.php");
?>