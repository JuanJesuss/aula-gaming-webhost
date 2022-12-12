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

function comprobar_reserva($fecha, $email, $db){
    $sql= "select * from reservas where email='$email' and fecha='$fecha';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function registrador($fecha, $turno, $db){
    $sql= "select registrador from reservas where fecha='$fecha' and turno='$turno';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function asignar_registrador($fecha, $email, $db){
    $sql= "update reservas set registrador='si' where fecha='$fecha' and email='$email';";
    if(!mysqli_query($db, $sql))
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function correo_registrador($fecha, $turno, $db){
    $sql= "select email from reservas where fecha='$fecha' and registrador='si' and turno='$turno';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

?>