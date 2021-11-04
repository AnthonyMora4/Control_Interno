<?php

function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="control_interno";
    $conex=mysqli_connect($server,$user,$pass,$db) or die ("Error a conectar".mysql_error());/*4 parametros 1 server,2 usuario, 3contra, base de datos*/
    //mysqli_select_db($db,$conex);
    return $conex;
}



?>