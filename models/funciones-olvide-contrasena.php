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

function generar_codigo() { 
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);//devuelve un string de 6 caracteres.
}

function insertar_codigo_base_datos($email, $cod_recuperar_contra, $db){
    $sql= "UPDATE alumnos SET codigo_recuperacion_password='$cod_recuperar_contra' WHERE email='$email';";
    if(!mysqli_query($db, $sql))
        echo "Error: ".$sql."<br>".mysqli_error($db);    
    else
        return true;
}

?>