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

function comprobar_juego($alias, $fecha, $db){
    $sql= "SELECT juego from partidas where alias='$alias' and fecha='$fecha';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function guardar($id, $fecha, $juego, $puesto, $alias, $turno, $email, $nombre, $apellidos, $db){
    $sql= "INSERT INTO partidas(id, fecha, juego, posicion, email, nombre, apellidos, alias, turno) values ('$id', '$fecha', '$juego', '$puesto', '$email', '$nombre', '$apellidos', '$alias', '$turno');";
    if(!mysqli_query($db, $sql))
        echo "Error: ".$sql."<br/>".mysqli_error($db);
    else
        return true;
}

function todos_alias($fecha, $turno, $db){
    $sql= "SELECT alias from reservas where fecha='$fecha' and turno='$turno';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function obtener_datos($alias, $db){
    $sql= "select email, nombre, apellidos from alumnos where alias='$alias';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function id_partidas($db){
    $sql= "select id from partidas;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function puestos($juego, $fecha, $turno, $db){
    $sql= "select posicion from partidas where juego='$juego' and fecha='$fecha' and turno='$turno';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
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

function juegos_alta_hoy($fecha, $turno, $db){
    $sql= "select juego from juegos where fecha='$fecha' and turno='$turno';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);   
}

?>
