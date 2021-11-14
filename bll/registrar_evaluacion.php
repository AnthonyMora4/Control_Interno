<?php include('../database/db.php');?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



<?php
$select1 = $_POST['select1'];
//$select2 = $_POST['select2'];
$nombre_eje  = $_POST['nombreEje'];
$txt1  = $_POST['txt1'];
$txt2  = $_POST['txt2'];
$txt3  = $_POST['txt3'];
$txt4  = $_POST['txt4'];
$txt5  = $_POST['txt5'];
$txt6  = $_POST['txt6'];
$txt7  = $_POST['txt7'];
$txt8  = $_POST['txt8'];
$txt9  = $_POST['txt9'];
$txt10  = $_POST['txt10'];

//obtener id del departamento
require('../database/db.php');
$stmt = $db_connection->prepare("CALL SelDeptoPorNombre(?);");
$stmt->bind_param('s', $select1);
$stmt->execute();
$getdEPTO = $stmt->get_result();
$qtyResults = $getdEPTO->num_rows;
while ($row = mysqli_fetch_array($getdEPTO)) {
    $id_dep =$row['id_departamento'];
}
$db_connection->close();

//Obtener el id del eje
require('../database/db.php');
$stmt = $db_connection->prepare("CALL SelEjePorNombre(?);");
$stmt->bind_param('s', $nombre_eje);
$stmt->execute();
$getEje = $stmt->get_result();
$qtyResults = $getEje->num_rows;
while ($row = mysqli_fetch_array($getEje)) {
    $id_eje =$row['id_eje'];
}
var_dump($id_eje);
var_dump($_POST['ch1']);

$db_connection->close();

//{}/////////////////////////////////////////////////////////////////////
if(isset($_POST['ch1']) && isset($_POST['ch1'])==1){
    require('../database/db.php');
    $ch1 = $_POST['ch1'];
    $opcion = "a";
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt1,$ch1, $txt2, $id_dep, $id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}else{
    require('../database/db.php');
    $opcion = "a";
    $est = 0;
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt1,$est, $txt2,$id_dep,$id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}
//////////////////////////////////////////////////////////////////////
if(isset($_POST['ch2']) && isset($_POST['ch2'])==1){
    require('../database/db.php');
    $ch2 = $_POST['ch2'];
    $opcion = "b";
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt3,$ch2, $txt4, $id_dep, $id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}else{
    require('../database/db.php');
    $opcion = "b";
    $est = 0;
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt3,$est, $txt4,$id_dep,$id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}
//////////////////////////////////////////////////////////////////////
if(isset($_POST['ch3']) && isset($_POST['ch3'])==1){
    require('../database/db.php');
    $ch3 = $_POST['ch3'];
    $opcion = "c";
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt5,$ch3, $txt6, $id_dep, $id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}else{
    require('../database/db.php');
    $opcion = "c";
    $est = 0;
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt5,$est, $txt6,$id_dep,$id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}
//////////////////////////////////////////////////////////////
if(isset($_POST['ch4']) && isset($_POST['ch4'])==1){
    require('../database/db.php');
    $ch4 = $_POST['ch4'];
    $opcion = "d";
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt7,$ch4, $txt8, $id_dep, $id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}else{
    require('../database/db.php');
    $opcion = "d";
    $est = 0;
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt7,$est, $txt8,$id_dep,$id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}
///////////////////////////////////////////////////////////////
if(isset($_POST['ch5']) && isset($_POST['ch5'])==1){
    require('../database/db.php');
    $ch5 = $_POST['ch5'];
    $opcion = "e";
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt9,$ch5, $txt10, $id_dep, $id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}else{
    require('../database/db.php');
    $opcion = "e";
    $est = 0;
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt9,$est, $txt10,$id_dep,$id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
}
/*if(isset($_POST['ch1']) && isset($_POST['ch1'])==1){
    $ch1  = $_POST['ch1'];
   

    require('../database/db.php');
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt1,$ch1, $txt2,$id_dep,$id_eje, $opcion);
    $stmt->execute();
    $db_connection->close();
    if($stmt){
    echo '<div class="alert alert-success">Creado correctamente, en 3 segundos será redireccionado</div>';
    header("Refresh: 2; URL=http://localhost/Proyecto/crear_evaluacion.php");
    }
}else{
    $op = "a";
    require('../database/db.php');
    $stmt = $db_connection->prepare("CALL InsEvaluacionP(?,?,?,?,?,?);");
    $stmt->bind_param('sisiis', $txt1,$ch1 , $txt2, $select1, $id_eje, $op);
    $stmt->execute();
    $db_connection->close();
}
if(isset($_POST['ch2'])){
    $ch2  = $_POST['ch2'];
}
if(isset($_POST['ch3'])){
    $ch3  = $_POST['ch3'];
}
if(isset($_POST['ch4'])){
    $ch4  = $_POST['ch4'];
}
if(isset($_POST['ch5'])){
    $ch5  = $_POST['ch5'];
}*/

?>