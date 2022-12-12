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

function todos_alias($fecha, $turno, $db){
    $sql= "SELECT alias from partidas where fecha='$fecha' and turno='$turno' group by alias;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function obtener_datos($fecha, $alias, $juego, $db){
    $sql= "select id, posicion from partidas where alias='$alias' and fecha='$fecha' and juego='$juego';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function borrar_partida($fecha, $alias, $juego, $db){
    $sql= "delete from partidas where fecha='$fecha' and alias='$alias' and juego='$juego';";
    if(mysqli_query($db, $sql))
        return true;
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

function juegos($fecha, $alias, $db){
    $sql= "select juego from partidas where alias='$alias' and fecha='$fecha' order by juego;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else
        echo "Error: ".$sql."<br/>".mysqli_error($db);
}

?>