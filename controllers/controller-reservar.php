<?php
    session_start();
    if(isset($_SESSION['email'])){
        $anio= date('Y');
        require_once("../views/reservar.php");
        if(isset($_POST['reservar'])){   
            require_once("../models/funciones-reservar.php");
            $db= conexion(); 
            if(empty($_POST['fecha']))
                echo "<span class=catorce>Seleccione una fecha.</span>";
            elseif(!validar_fecha($_POST['fecha']))//comprobamos que la fecha seleccionada sea un día lectivo del calendario escolar
                echo "<span class=catorce>Día no lectivo.</span>";
            else{
                $fila= comprobar_disponibilidad($_POST['fecha'], $_SESSION['turno'], $db);
                $ids_reserva= ids_reserva($db);
                $mayor=0;
                while($row= mysqli_fetch_assoc($ids_reserva)){
                    if($row['id']>$mayor)
                        $mayor= $row['id'];
                }
                if(mysqli_num_rows($fila)==0){//si no hay reservas en la fecha y turno indicado, se te asigna el puesto 1 y serás el responsable.
                    if(reservar(($mayor+1), "1", $_POST['fecha'], $_SESSION['email'], $_SESSION['turno'], $_SESSION['alias'], $db))//se hace la reserva, y si devuelve true es porque se ejecutó correctamente  
                        echo "<p class=dieciseis>Reserva efectuada con éxito:</p><p class=quince>- Id reserva: ".($mayor+1)."<br/>- Fecha: ".date("d/m/Y", strtotime($_POST['fecha']))."<br/>- Puesto: 1<br/>- Turno: ".$_SESSION['turno']."<br/>- Alias: ".$_SESSION['alias']."</p>";
                }
                elseif(mysqli_num_rows($fila)>0 && mysqli_num_rows($fila)<9){//si el numero de reservas es mayor a 0 y menor a 9
                    $fila2= comprobar_email($_POST['fecha'], $_SESSION['turno'], $_SESSION['email'], $db);//comprobamos si el email del usuario ya tiene reserva en la fecha y turno indicado
                    if(mysqli_num_rows($fila2)==0){//si no tiene reserva
                        $puestos= puestos($_POST['fecha'], $_SESSION['turno'], $db);//obtenemos puestos
                        $mayor2= 0;
                        $posiciones= array();
                        while($row= mysqli_fetch_assoc($puestos)){
                            array_push($posiciones, intval($row['puesto']));//guardamos puestos
                            if(intval($row['puesto'])>$mayor2)
                                $mayor2= intval($row['puesto']);//obtenemos puesto mayor
                        }
                        if($mayor2==1)//si el puesto mayor es 1
                            $pos= 2;//asignamos como puesto el 2
                        else{
                            $pos= '';
                            $valido= true;
                            $indice= 1;
                            while($valido && $indice<=$mayor2){
                                if(array_search($indice, $posiciones)===false){//comprobamos si hay alguna reserva que haya sido anulada
                                    $valido=false;
                                    $pos= $indice;//almacenamos el puesto libre
                                }
                                $indice++;
                            }
                            if($valido)//si no hay ninguna reserva que haya sido anulada
                                $pos= $mayor2+1;//sumamos 1 puesto al útimo
                        }
                        if($pos==1){
                            if(reservar(($mayor+1), $pos, $_POST['fecha'], $_SESSION['email'], $_SESSION['turno'], $_SESSION['alias'], $db))//cuando el puesto 1 esté libre porque se haya anulado su reserva, se pone responsable: si    
                                echo "<p class=dieciseis>Reserva efectuada con éxito:</p><p class=quince>- Id reserva: ".($mayor+1)."<br/>- Fecha: ".date("d/m/Y", strtotime($_POST['fecha']))."<br/>- Puesto: ".$pos."<br/>- Turno: ".$_SESSION['turno']."<br/>- Alias: ".$_SESSION['alias']."</p>";    
                        }
                        else{
                            if(reservar(($mayor+1), $pos, $_POST['fecha'], $_SESSION['email'], $_SESSION['turno'], $_SESSION['alias'], $db))//para el resto de puestos se pone responsable: no
                                echo "<p class=dieciseis>Reserva efectuada con éxito:</p><p class=quince>- Id reserva: ".($mayor+1)."<br/>- Fecha: ".date("d/m/Y", strtotime($_POST['fecha']))."<br/>- Puesto: ".$pos."<br/>- Turno: ".$_SESSION['turno']."<br/>- Alias: ".$_SESSION['alias']."</p>";
                        }
                    }
                    else//si ya tiene reserva en la fecha y turno indicado
                        echo "<span class=catorce>Ya has reservado un puesto el ".date("d/m/Y", strtotime($_POST['fecha'])).".</span>";
                }
                else//si el número de reservas es 9 en la fecha y turno indicado
                    echo "<span class=catorce>No quedan puestos disponibles el ".date("d/m/Y", strtotime($_POST['fecha']))."</span>";
            }
        }
    }
    else
        header("location: controller-sesion.php");
?>