
<?php

session_start();
$array = array();
$array_ejes = array();

$usuario = $_SESSION['usuario'];
//$txt1 = $_POST['txt1'];

$txt2 = $_POST['txt2'];// evidencia
$txt4 = $_POST['txt4'];// evidencia
$txt6 = $_POST['txt6'];// evidencia
$txt8 = $_POST['txt8'];// evidencia
$txt10 = $_POST['txt10'];// evidencia*/
$puntos = 0;
$valido = true;

$usuario = $_SESSION['usuario'];  
  require('../database/db.php');
  $stmt = $db_connection->prepare("CALL SelidDeparamentoPorUsuario(?);");
  $stmt->bind_param('s', $usuario); 
  $stmt->execute();
  $getUsuario = $stmt->get_result();
  $qtyResults = $getUsuario->num_rows;
  $db_connection->close();
  while ($row = mysqli_fetch_array($getUsuario)) {
    $id_dep = $row['id_departamento'];
  }

  require('../database/db.php');
  $stmt = $db_connection->prepare("CALL SelobtenerPreguntas(?);");
  $stmt->bind_param('i', $id_dep); 
  $stmt->execute();
  $getDepartamento = $stmt->get_result();
  $qtyResults = $getDepartamento->num_rows;
  $db_connection->close();
  while ($row = mysqli_fetch_array($getDepartamento)) {
    $criterios = $row['criterios'];
    $estado = $row['estado_evidencia'];// obligatoria o no 
    $id_eje = $row['id_eje'];
    array_push($array,$criterios, $estado,$id_eje);
    array_push($array_ejes,$id_eje);
  }

if(isset($_POST['ch1']) && isset($_POST['ch1'])==1){
    if(strlen($txt2) == 0)
    {
        echo '<div class="alert alert-success">Necesita una evidencia, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php"); 
        $valido = false;
    }
}

if(isset($_POST['ch2']) && isset($_POST['ch2'])==1){
    if(strlen($txt4) == 0)
    {
        echo '<div class="alert alert-success">Necesita una evidencia, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php"); 
        $valido = false;
    }
}

if(isset($_POST['ch3']) && isset($_POST['ch3'])==1){if(strlen($txt6) == 0){
        echo '<div class="alert alert-success">Necesita una evidencia, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php"); 
        $valido = false;
    }
}


if(isset($_POST['ch4']) && isset($_POST['ch4'])==1){if(strlen($txt8) == 0)
    {
        echo '<div class="alert alert-success">Necesita una evidencia, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php"); 
        $valido = false;
    }
}
   
if(isset($_POST['ch5']) && isset($_POST['ch5'])==1){if(strlen($txt10) == 0){
        echo '<div class="alert alert-success">Necesita una evidencia, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php"); 
        $valido = false;
    }

}
    if($txt2 == "obligatoria" || $txt4 == "obligatoria" || $txt6 == "obligatoria" || $txt8 == "obligatoria" || $txt10 == "obligatoria")
    {
        echo '<div class="alert alert-success">Necesita una evidencia obligatoria, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php"); 
        $valido = false;
    }


    if(strlen($txt2) == 0 && strlen($txt4) == 0 && strlen($txt6) == 0 && strlen($txt8) == 0 && strlen($txt10) == 0)
    {
        echo '<div class="alert alert-success">Debe marcar opciones, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php"); 
        $valido = false;        
    }
 
    if($valido == true)
    {

        if(isset($_POST['ch1']) && isset($_POST['ch1'])==1)
        {
            $puntos = 20;
            $opcion = "a";
            $marcada = 1;// si la opcion esta marcada
            
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt2,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }
        else
        {
            $puntos = 0;
            $opcion = "a";
            $marcada = 0;// si la opcion no esta marcada
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt2,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }

        if(isset($_POST['ch2']) && isset($_POST['ch2'])==1)
        {
            $puntos = 20;
            $opcion = "b";
            $marcada = 1;// si la opcion esta marcada
            
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt4,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }
        else
        {
            $puntos = 0;
            $opcion = "b";
            $marcada = 0;// si la opcion no esta marcada
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt4,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }

        if(isset($_POST['ch3']) && isset($_POST['ch3'])==1)
        {
            $puntos = 20;
            $opcion = "c";
            $marcada = 1;// si la opcion esta marcada
            
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt6,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }
        else
        {
            $puntos = 0;
            $opcion = "c";
            $marcada = 0;// si la opcion no esta marcada
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt6,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }
       
        if(isset($_POST['ch4']) && isset($_POST['ch4'])==1)
        {
            $puntos = 20;
            $opcion = "d";
            $marcada = 1;// si la opcion esta marcada
            
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt8,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }
        else
        {
            $puntos = 0;
            $opcion = "d";
            $marcada = 0;// si la opcion no esta marcada
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt8,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }

        if(isset($_POST['ch5']) && isset($_POST['ch5'])==1)
        {
            $puntos = 20;
            $opcion = "e";
            $marcada = 1;// si la opcion esta marcada
            
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt10,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close();
        }
        else
        {
            $puntos = 0;
            $opcion = "e";
            $marcada = 0;// si la opcion no esta marcada
            include('../database/db.php');
            $stmt = $db_connection->prepare("CALL RegistrarRespuestaEvidencia(?,?,?,?,?,?);");
            $stmt->bind_param('isisis',$estado,$txt10,$id_eje,$opcion,$puntos,$usuario);
            $stmt->execute();
            $db_connection->close(); 
        }

        
 
        
        
        
        
        //}elseif(isset($_GET['id']) && isset($_GET['id']) == 4){// tabla 4
          //  $ocultar = 4;
        //}

        


        /*
        if($array_ejes[0] == 1 )
        {
              
        }elseif($array_ejes[5] == 2 ){
            $ocultar = 2;
        }elseif($array_ejes[10] == 3 ){
            $ocultar = 3;

        }
                
               
        $cont = 0;
        /*
        for($i=0;$i<count($array);$i++)
        {
            echo $cont." ".$array[$i]." ";
            $cont++;
        }*/
        /*
        for($i=0;$i<count($array_ejes);$i++)
        {
            echo $array_ejes[$i]." ";
            
        }*/


        

       echo '<div class="alert alert-success">Encuesta registrada, en 3 segundos será redireccionado</div>';
        header("Refresh: 2;URL=http://localhost/Final/responder_evaluacion_view.php?ocultar=$ocultar"); 

    }


  
?>











