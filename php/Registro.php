<?php
include("Conexion.php");//llamo la conexion
//extraen los valores de los inputs
$Nombre =$_POST['nombre'];
$Apellido =$_POST['apellido'];
$cedula =$_POST['cedula'];
$Correo =$_POST['correo'];
$telefono =$_POST['telefono'];
$contra =$_POST['contra'];
//variable para mensaje
$mensaje;
//validan campos en js
$conex=conectar();
$consulta="INSERT INTO usuarios VALUES ('$Nombre', '$Apellido', '$cedula','$Correo',$telefono,'$contra',1,1)";
$resultado=mysqli_query($conex,$consulta);
if($resultado==1){
$mensaje="Usuario registrado";
}else{
    $mensaje="Error, usuario no registrado";
}
header("Location: http://localhost/ProyectoASPW/Registro.php");

//funcion que devuelve el mensaje
function mensaje(){
   return $mensaje;
}

?>