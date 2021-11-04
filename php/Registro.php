<?php
include("Conexion.php");//llamo la conexion
$conex=conectar();
echo "exitoooo";
$Nombre =$_POST['nombre'];
$Apellido =$_POST['apellido'];
$cedula =$_POST['cedula'];
$Correo =$_POST['correo'];
$telefono =$_POST['telefono'];
$contra =$_POST['contra'];
//header("Location: http://localhost/ProyectoASPW/Registro.html");
?>