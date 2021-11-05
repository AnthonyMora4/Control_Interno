<?php

function conectar(){
    //datos de conexion
    $user="root";
    $pass="";
    $server="localhost";
    $db="control_interno";
    $conex=mysqli_connect($server,$user,$pass,$db) or die ("Error a conectar".mysql_error());/*4 parametros 1 server,2 usuario, 3contra, base de datos*/
    //validar si ubo un error de conexion
    if($conex->connect_errno){
        die("La conexion fallo".$conex->connect_errno);
    }
    return $conex;
}



?>