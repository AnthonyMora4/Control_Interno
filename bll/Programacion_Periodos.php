<?php
include('../database/db.php');//llamo la conexion
//extraen los valores de los inputs
$Fecha_ini =$_POST['Cal_inicio'];
$Fecha_fin =$_POST['Cal_fin'];
$Nombre =$_POST['Nombre_periodo'];
$id_depto=$_POST['id_Depto'];
$Nom_depto=$_POST['Nom_Depto'];
if(isset($_POST['activo'])){
    $Estado=1;//estado activo
}else{
    $Estado=0;//esto es inactivo
}

$Form_fech_ini=explode("T",$Fecha_ini);
$Form_fech_fin=explode("T",$Fecha_fin);
$Fecha_ini=$Form_fech_ini[0]." ".$Form_fech_ini[1].":00";
$Fecha_fin=$Form_fech_fin[0]." ".$Form_fech_fin[1].":00";

//variable para mensaje
$mensaje;
//validan campos en js
//inserta los periodos

$stmt = $db_connection->prepare("SELECT a.id_estado,b.fecha_hora_final FROM evaluacion_final a JOIN periodos b on a.id_periodo=b.id_periodo WHERE b.id_departamento=$id_depto");
$stmt->execute();
$getestado = $stmt->get_result();
$qtyResults = $getestado->num_rows;
$pasar=0;//variable que dice si ahy un periodo activo
$FechaComparacion="";
while($datos3=mysqli_fetch_array($getestado)){
$id_estado=$datos3['id_estado'];
$Fecha_final=$datos3['fecha_hora_final'];
if($id_estado==1){
    $pasar=1;
    $FechaComparacion=$Fecha_final;
}
}
//falta ---------------------------------------------------------------------------------------------------------------------------------
date_default_timezone_set("America/Costa_Rica");
$fecha_actual =date("Y-m-d H:i:s");


if($pasar==0 && $FechaComparacion<$Fecha_ini){//si hay alguna con el estado activo no lo deja insertar otro periodo 


$consulta="INSERT INTO periodos VALUES (NULL,'$Nombre', '$Fecha_ini', '$Fecha_fin','$id_depto')";
$resultado=mysqli_query($db_connection,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
//extrae el id de la evaluacion
$stmt = $conex->prepare("SELECT a.id_evaluacion from evaluaciones a WHERE a.id_departamento=$id_depto");
$stmt->execute();
$getId_Eva = $stmt->get_result();
$qtyResults = $getId_Eva->num_rows;
while($datos=mysqli_fetch_array($getId_Eva)){
$id_evaluacion=$datos['id_evaluacion'];
}

//extrae el id de periodo
$stmt = $db_connection->prepare("SELECT a.id_periodo FROM periodos a WHERE a.id_departamento=$id_depto ORDER BY a.id_periodo");
$stmt->execute();
$getId_peri = $stmt->get_result();
$qtyResults = $getId_peri->num_rows;
while($datos2=mysqli_fetch_array($getId_peri)){
$id_periodo=$datos2['id_periodo'];
}

//inserta en las evaluaciones finales
$consulta2="INSERT INTO evaluacion_final VALUES (NULL,'$id_evaluacion', '$id_periodo', '$Estado')";
$resultado=mysqli_query($db_connection,$consulta2);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
$conex->close();
session_start();//inicio de la sesion
if($resultado>=1 && $consulta2>=1){//validacion de resultados
$mensaje="Periodo iniciado";//variable con mensaje
$_SESSION['mensaje']=$mensaje;//llena la variable de sesion
}else{
    $mensaje="Error, Periodo no iniciado";
    $_SESSION['mensaje']=$mensaje;
}

header("Location: http://localhost/GitProyectoASPW/Control_Interno/Periodos.view.php?id_depto=$id_depto&%20depa=$Nom_depto");//redirecciona a la pagina Registro.php
}else{
    session_start();
    $mensaje="Error, Ya hay un periodo activo";//variable con mensaje
    $_SESSION['mensaje']=$mensaje;//llena la variable de sesion
    header("Location: http://localhost/GitProyectoASPW/Control_Interno/Periodos.view.php?id_depto=$id_depto&%20depa=$Nom_depto");//redirecciona a la pagina Registro.php
}


?>