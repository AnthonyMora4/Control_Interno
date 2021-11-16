<?php
include('../database/db.php');//llamo la conexion
//extraen los valores de los inputs
$id_depto=$_POST['id_Depto'];
$id_Peri=$_POST['id_Peri'];
$Nom_depto=$_POST['Nom_Depto'];
if(isset($_POST['activo'])){
    $estado=$_POST['activo'];
}else{
    $estado="";
}

if(isset($_POST['Cal_inicio'])&&$_POST['Cal_inicio']!=""){
//update de fecha inicio
$fechaini=$_POST['Cal_inicio'];
$Form_fech_ini=explode("T",$fechaini);
$Fecha_ini=$Form_fech_ini[0]." ".$Form_fech_ini[1].":00";
$consulta1="UPDATE periodos a SET a.fecha_hora_inicio='$Fecha_ini' WHERE a.id_periodo=$id_Peri";
$resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
}
    if(isset($_POST['Cal_fin'])&&$_POST['Cal_fin']!=""){
        //update de fecha de fin
        $fechafin=$_POST['Cal_fin'];
        $Form_fech_fin=explode("T",$fechafin);
        $Fecha_fin=$Form_fech_fin[0]." ".$Form_fech_fin[1].":00";
        $consulta1="UPDATE periodos a SET a.fecha_hora_final='$Fecha_fin' WHERE a.id_periodo=$id_Peri";
        $resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
        }
        if(isset($_POST['Nombre_periodo'])&&$_POST['Nombre_periodo']!=""){
            //update de nombre
            $Nom_periodo=$_POST['Nombre_periodo'];
            $consulta1="UPDATE periodos a SET a.nombre_periodo='$Nom_periodo' WHERE a.id_periodo=$id_Peri";
            $resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
        }
//update de activo o desactivo
$stmt = $db_connection->prepare("SELECT a.id_estado,b.id_periodo FROM evaluacion_final a JOIN periodos b on a.id_periodo=b.id_periodo WHERE b.id_departamento=$id_depto");
$stmt->execute();
$getestado = $stmt->get_result();
$qtyResults = $getestado->num_rows;
$pasar=0;//variable que dice si ahy un periodo activo
$verif_id_peri=0;
while($datos3=mysqli_fetch_array($getestado)){
$id_estado=$datos3['id_estado'];
$id_Periodo1=$datos3['id_periodo'];
if($id_estado==1){
    $pasar=1;
    $verif_id_peri=$id_Periodo1;
}
}
//verifica si ya hay un periodo activo entonces no lo deja activarlo y si no entonces si lo puede activar
if($pasar==0){
    if($_POST['activo']=="Activo"){
        $consulta1="UPDATE evaluacion_final a SET a.id_estado=1 WHERE a.id_periodo=$id_Peri";
        $resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
        $estado=1;
    }else{
        $consulta1="UPDATE evaluacion_final a SET a.id_estado=0 WHERE a.id_periodo=$id_Peri";
        $resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
        $estado=0;
    }
}else{
    if($verif_id_peri==$id_Peri){//si es el mismo id del periodo activo puede hacer lo que quiera y si no entonces lo pone inactivo
        if($_POST['activo']=="Activo"){
            $consulta1="UPDATE evaluacion_final a SET a.id_estado=1 WHERE a.id_periodo=$id_Peri";
            $resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
            $estado=1;
        }else{
            $consulta1="UPDATE evaluacion_final a SET a.id_estado=0 WHERE a.id_periodo=$id_Peri";
            $resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
            $estado=0;
        }
    }else{
    $consulta1="UPDATE evaluacion_final a SET a.id_estado=0 WHERE a.id_periodo=$id_Peri";
    $resultado1=mysqli_query($db_connection,$consulta1);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
    if($estado=="Activo"){
        session_start();
        $mensaje="Error, Ya hay un periodo activo";//variable con mensaje
        $_SESSION['mensaje']=$mensaje;//llena la variable de sesion
     }
     $estado=0;
    }
}

if($resultado1>=1){
    header("Location: http://localhost/GitProyectoASPW/Control_Interno/Modificar_periodos.view.php?id_depto=$id_depto&depa=$Nom_depto&Id_peri=$id_Peri&activ=$estado");
}
?>