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

function obtener_password($email, $db){
    $sql= "select password from alumnos where email='$email';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}


function cambiar_contrasenia($email, $nuevacontrasenia, $db){
    $sql= "UPDATE alumnos SET password='$nuevacontrasenia' WHERE email='$email';";
        if(!mysqli_query($db, $sql))
            echo "Error: ".$sql."<br>".mysqli_error($db);    
        else
            return true;
}

?>