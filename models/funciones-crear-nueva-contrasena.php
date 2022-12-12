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

function obtener_codigos_rec($db){
    $sql= "select codigo_recuperacion_password from alumnos;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function guardar($email, $password, $db){
    if(eliminar_cod_recuperacion($email, $db)){
        $sql= "UPDATE alumnos SET password='$password' WHERE email='$email';";
        if(!mysqli_query($db, $sql))
            echo "Error: ".$sql."<br>".mysqli_error($db);    
        else
            return true;
    }
}

function eliminar_cod_recuperacion($email, $db){
    $sql= "UPDATE alumnos SET codigo_recuperacion_password='' WHERE email='$email';";
    if(!mysqli_query($db, $sql))
        echo "Error: ".$sql."<br>".mysqli_error($db);    
    else
        return true;
}

?>