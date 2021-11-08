<?php
include("Conexion.php");//llamo la conexion
//extraen los valores de los inputs
$Nombre =$_POST['nombre'];
$Apellido =$_POST['apellido'];
$cedula =$_POST['cedula'];
$Correo =$_POST['correo'];
$telefono =$_POST['telefono'];
$contra =$_POST['contra'];
$departamento =$_POST['departamentos'];
//variable para mensaje
$mensaje;
//validan campos en js
$conex=conectar();//llama la funcion de conexion que conecta la base de datos
$consulta="INSERT INTO usuarios VALUES ('$Nombre', '$Apellido', '$cedula',$telefono,'$Correo','$contra',1,$departamento)";
$resultado=mysqli_query($conex,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
session_start();//inicio de la sesion
if($resultado>=1){//validacion de resultados
$mensaje="Usuario registrado";//variable con mensaje
$_SESSION['mensaje']=$mensaje;//llena la variable de sesion
}else{
    $mensaje="Error, usuario no registrado";
    $_SESSION['mensaje']=$mensaje;
}
header("Location: http://localhost/GitProyectoASPW/Control_Interno/Registro.view.php");//redirecciona a la pagina Registro.php

?>