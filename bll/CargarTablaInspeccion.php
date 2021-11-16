<?php
include('../database/db.php');
$id_componente=$_POST['select'];
$id_depto=$_POST['id_depto'];
$depa=$_POST['nom_depto'];
$consulta="SELECT b.nombre_eje,b.id_eje,c.evidencia_requerida,a.evidencia,a.puntuaje from evaluacionrespondida a JOIN ejes b on a.id_eje=b.id_eje JOIN evaluaciones c on(c.id_eje=a.id_eje AND c.opcion=a.opcion) JOIN usuarios d on a.encargado_correo=d.correo_usuario WHERE d.id_departamento=$id_depto AND b.id_componente=$id_componente";
$resultado=mysqli_query($db_connection,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
$Compromiso= array(20);
$Etica= array(20);
$Personal= array(20);
$Estructura= array(20);
$id_eje1;
$id_eje2;
$id_eje3;
$id_eje4;
$idx=0;
$idx2=0;
$idx3=0;
$idx4=0;
while($datos=mysqli_fetch_array($resultado)){
if($datos['nombre_eje']=="Compromiso"){
    $id_eje1=$datos['id_eje'];
    $Compromiso[$idx]=$datos['nombre_eje'];
    $idx++;
    $Compromiso[$idx]=$datos['evidencia_requerida'];//1-5-9-13-17
    $idx++;
    $Compromiso[$idx]=$datos['evidencia'];//2-6-10-14-18
    $idx++;
    $Compromiso[$idx]=$datos['puntuaje'];
    $idx++;
}else if($datos['nombre_eje']=="Etica"){
    $id_eje2=$datos['id_eje'];
    $Etica[$idx2]=$datos['nombre_eje'];
    $idx2++;
    $Etica[$idx2]=$datos['evidencia_requerida'];
    $idx2++;
    $Etica[$idx2]=$datos['evidencia'];
    $idx2++;
    $Etica[$idx2]=$datos['puntuaje'];
    $idx2++;
}else if($datos['nombre_eje']=="Personal"){
    $id_eje3=$datos['id_eje'];
    $Personal[$idx3]=$datos['nombre_eje'];
    $idx3++;
    $Personal[$idx3]=$datos['evidencia_requerida'];
    $idx3++;
    $Personal[$idx3]=$datos['evidencia'];
    $idx3++;
    $Personal[$idx3]=$datos['puntuaje'];
    $idx3++;
}else if($datos['nombre_eje']=="Estructura"){
    $id_eje4=$datos['id_eje'];
    $Estructura[$idx4]=$datos['nombre_eje'];
    $idx4++;
    $Estructura[$idx4]=$datos['evidencia_requerida'];
    $idx4++;
    $Estructura[$idx4]=$datos['evidencia'];
    $idx4++;
    $Estructura[$idx4]=$datos['puntuaje'];
    $idx4++;
}
}
$puntaje1=0;
$puntaje2=0;
$puntaje3=0;
$puntaje4=0;
if(isset($Compromiso[19])){


$puntaje1=$Compromiso[3]+$Compromiso[7]+$Compromiso[11]+$Compromiso[15]+$Compromiso[19];
$puntaje2=$Etica[3]+$Etica[7]+$Etica[11]+$Etica[15]+$Etica[19];
$puntaje3=$Personal[3]+$Personal[7]+$Personal[11]+$Personal[15]+$Personal[19];
$puntaje4=$Estructura[3]+$Estructura[7]+$Estructura[11]+$Estructura[15]+$Estructura[19];

$CompromisoFinal= array(5);
$CompromisoFinal[0]=$Compromiso[0];
$CompromisoFinal[1]='1.'.$Compromiso[1].'<br>2.'.$Compromiso[5].'<br>3.'.$Compromiso[9].'<br>4.'.$Compromiso[13].'<br>5.'.$Compromiso[17];
$CompromisoFinal[2]='1.'.$Compromiso[2].'<br>2.'.$Compromiso[6].'<br>3.'.$Compromiso[10].'<br>4.'.$Compromiso[14].'<br>5.'.$Compromiso[18];
$CompromisoFinal[3]=$puntaje1;

$EticaFinal= array(5);
$EticaFinal[0]= $Etica[0];
$EticaFinal[1]='1.'.$Etica[1].'<br>2.'.$Etica[5].'<br>3.'.$Etica[9].'<br>4.'.$Etica[13].'<br>5.'.$Etica[17];
$EticaFinal[2]='1.'.$Etica[2].'<br>2.'.$Etica[6].'<br>3.'.$Etica[10].'<br>4.'.$Etica[14].'<br>5.'.$Etica[18];
$EticaFinal[3]= $puntaje2;


$PersonalFinal= array(5);
$PersonalFinal[0]= $Personal[0];
$PersonalFinal[1]='1.'.$Personal[1].'<br>2.'.$Personal[5].'<br>3.'.$Personal[9].'<br>4.'.$Personal[13].'<br>5.'.$Personal[17];
$PersonalFinal[2]='1.'.$Personal[2].'<br>2.'.$Personal[6].'<br>3.'.$Personal[10].'<br>4.'.$Personal[14].'<br>5.'.$Personal[18];
$PersonalFinal[3]= $puntaje3;

$EstructuraFinal= array(5);
$EstructuraFinal[0]= $Estructura[0];
$EstructuraFinal[1]='1.'.$Estructura[1].'<br>2.'.$Estructura[5].'<br>3.'.$Estructura[9].'<br>4.'.$Estructura[13].'<br>5.'.$Estructura[17];
$EstructuraFinal[2]='1.'.$Estructura[2].'<br>2.'.$Estructura[6].'<br>3.'.$Estructura[10].'<br>4.'.$Estructura[14].'<br>5.'.$Estructura[18];
$EstructuraFinal[3]= $puntaje4;

session_start();

$_SESSION['id_componente']=$id_componente;

$_SESSION['eje1']=$id_eje1;
$_SESSION['CompromisoFinal1']=$CompromisoFinal[0];
$_SESSION['CompromisoFinal2']=$CompromisoFinal[1];
$_SESSION['CompromisoFinal3']=$CompromisoFinal[2];
$_SESSION['CompromisoFinal4']=$CompromisoFinal[3];

$_SESSION['eje2']=$id_eje2;
$_SESSION['EticaFinal1']=$EticaFinal[0];
$_SESSION['EticaFinal2']=$EticaFinal[1];
$_SESSION['EticaFinal3']=$EticaFinal[2];
$_SESSION['EticaFinal4']=$EticaFinal[3];

$_SESSION['eje3']=$id_eje3;
$_SESSION['PersonalFinal1']=$PersonalFinal[0];
$_SESSION['PersonalFinal2']=$PersonalFinal[1];
$_SESSION['PersonalFinal3']=$PersonalFinal[2];
$_SESSION['PersonalFinal4']=$PersonalFinal[3];

$_SESSION['eje4']=$id_eje4;
$_SESSION['EstructuraFinal1']=$EstructuraFinal[0];
$_SESSION['EstructuraFinal2']=$EstructuraFinal[1];
$_SESSION['EstructuraFinal3']=$EstructuraFinal[2];
$_SESSION['EstructuraFinal4']=$EstructuraFinal[3];

header("Location: http://localhost/GitProyectoASPW/Control_Interno/Inspeccion_evaluacion.view.php?id_depto=$id_depto&depa=$depa");//redirecciona a la pagina principal
}else{
    echo '<div class="alert alert-danger"><h3>Error al cargar los datos, en 3 segundos será redireccionado</h3></div>';
    header("Refresh: 2; URL=http://localhost/GitProyectoASPW/Control_Interno/Inspeccion_evaluacion.view.php?id_depto=$id_depto&depa=$depa");  
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">