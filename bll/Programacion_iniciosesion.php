<?php 
include('../database/db.php');//llamo la conexion
//extraen los valores de los inputs
$Correo =$_POST['correo'];
$contra =$_POST['contra'];
//variable para mensaje
$GetCorreo="";
$GetContra="";
$mensaje;
//validan campos en js
$consulta="SELECT * FROM usuarios WHERE correo_usuario='$Correo'";
$resultado=mysqli_query($db_connection,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
while($datos=mysqli_fetch_array($resultado)){
    $GetContra=$datos['contrasena'];
    $GetCorreo=$datos['correo_usuario'];
    $Getid_rol=$datos['id_rol'];
}
session_start();//inicio de la sesion
if($GetCorreo==$Correo && $GetContra==$contra){//validacion de resultados
    $_SESSION['id_rol']=$Getid_rol;
    $_SESSION['usuario']=$Correo;
    header("Location: http://localhost/Final/index.php");//redirecciona a la pagina principal
}else{
    $mensaje="Error, el correo y/o contraseña no son validos";
    $_SESSION['mensaje']=$mensaje;
    header("Location: http://localhost/Final/Iniciosesion.view.php");//redirecciona a la pagina principal
}

?>