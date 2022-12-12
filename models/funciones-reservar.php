<?php

function conexion(){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'id20001675_root');
    define('DB_PASSWORD', 'rootroot7$Ef');
    define('DB_DATABASE', 'id20001675_aulagaming');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if(!$db)
		die("Error conexión: ".mysqli_connect_error());
    return $db;
}

function validar_fecha($fecha){
    $dias_nolectivos= array('2022-11-12','2022-11-13','2022-11-19','2022-11-20','2022-11-26','2022-11-27',//dias no lectivos de noviembre
    '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', '2022-12-08', '2022-12-10', '2022-12-11', '2022-12-17','2022-12-18','2022-12-23','2022-12-24','2022-12-25','2022-12-26','2022-12-27','2022-12-28','2022-12-29','2022-12-30','2022-12-31',//dias no lectivos de diciembre
    '2023-01-01','2023-01-02','2023-01-03','2023-01-04','2023-01-05','2023-01-06','2023-01-07','2023-01-08','2023-01-14','2023-01-15','2023-01-21','2023-01-22','2023-01-28','2023-01-29',//dias no lectivos de enero
    '2023-02-04','2023-02-05','2023-02-11','2023-02-12','2023-02-18','2023-02-19','2023-02-24','2023-02-25','2023-02-26','2023-02-27',//dias no lectivos de febrero
    '2023-03-04','2023-03-05','2023-03-11','2023-03-12','2023-03-18','2023-03-19','2023-03-20','2023-03-25','2023-03-26','2023-03-31',//dias no lectivos de marzo
    '2023-04-01','2023-04-02','2023-04-03','2023-04-04','2023-04-05','2023-04-06','2023-04-07','2023-04-08','2023-04-09','2023-04-10','2023-04-15','2023-04-16','2023-04-22','2023-04-23','2023-04-29','2023-04-30',//dias no lectivos de abril
    '2023-05-01','2023-05-02','2023-05-06','2023-05-07','2023-05-13','2023-05-14','2023-05-15','2023-05-20','2023-05-21','2023-05-27','2023-05-28',//dias no lectivos de mayo
    '2023-06-03','2023-06-04','2023-06-10','2023-06-11','2023-06-17','2023-06-18');//dias no lectivos de junio
    $valido= true;
    if(in_array($fecha, $dias_nolectivos))
        $valido=false;
    return $valido;
}

function comprobar_disponibilidad($fecha, $turno, $db){
    $sql= "SELECT * from reservas WHERE fecha='$fecha' AND turno='$turno';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function comprobar_email($fecha, $turno, $email, $db){
    $sql= "SELECT email from reservas WHERE fecha='$fecha' AND turno='$turno' AND email='$email';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function ids_reserva($db){
    $sql= "select id from reservas;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function puestos($fecha, $turno, $db){
    $sql= "select puesto from reservas where fecha='$fecha' and turno='$turno';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function reservar($id, $puesto, $fecha, $email, $turno, $alias, $db){
    $sql= "INSERT INTO reservas(ID, PUESTO, FECHA, EMAIL, TURNO, REGISTRADOR, ALIAS) VALUES ('$id', '$puesto', '$fecha', '$email', '$turno', '', '$alias');";
    if(!mysqli_query($db, $sql))
        echo "Error: ".$sql."<br/>".mysqli_error($db);
    else
        return true;
}

?>