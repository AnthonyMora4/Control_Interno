<?php

function Extraer_depto(){//me extrae el nombre y codigo del array
    include("Conexion.php");//llamo la conexion
    //$departamentos=array();//declaro el array
    $conex=conectar();//conecto a base de datos
    $consulta="SELECT departamentos.id_departamento,departamentos.nombre_departamento,departamentos.siglas_departamento FROM departamentos";//creo la consulata
    $resultado=mysqli_query($conex,$consulta);//realiza la consulta
    return $resultado;//en resultado se guarda en forma de matriz los datos de la bd 
}
?>