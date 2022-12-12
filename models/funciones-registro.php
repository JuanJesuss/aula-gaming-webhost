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

function eliminar_tildes($cadena){
    $cadena = str_replace(array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'), array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'), $cadena);//Reemplazamos la A y a
    $cadena = str_replace(array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'), array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'), $cadena );//Reemplazamos la E y e
    $cadena = str_replace(array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'), array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'), $cadena );//Reemplazamos la I y i
    $cadena = str_replace( array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'), array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'), $cadena );//Reemplazamos la O y o
    $cadena = str_replace(array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'), array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'), $cadena );//Reemplazamos la U y u
    $cadena = str_replace(array('Ñ', 'ñ', 'Ç', 'ç'), array('N', 'n', 'C', 'c'), $cadena);//Reemplazamos la N, n, C y c
    return $cadena;
}

function registrar($email, $password, $alias, $turno, $nombre, $apellidos, $db){
    $sql= "INSERT INTO alumnos(EMAIL, PASSWORD, ALIAS, TURNO, NOMBRE, APELLIDOS, CODIGO_RECUPERACION_PASSWORD) VALUES ('$email', '$password', '$alias', '$turno', '$nombre', '$apellidos', '');";
    if(!mysqli_query($db, $sql))
        echo "Error: ".$sql."<br/>".mysqli_error($db);
    else
        return true;
}

function obtener_todos_alias($db){
    $sql= "SELECT alias from alumnos;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function obtener_correos($db){
    $sql= "SELECT email from alumnos;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

?>