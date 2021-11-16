
<?php
  session_start();
  $array = array();  
	if (isset($_SESSION['usuario'])) { 
    $usuario = $_SESSION['usuario'];  
  }
  


  //var_dump($usuario);
  require('database/db.php');
  $stmt = $db_connection->prepare("CALL SelidDeparamentoPorUsuario(?);");
  $stmt->bind_param('s', $usuario); 
  $stmt->execute();
  $getUsuario = $stmt->get_result();
  $qtyResults = $getUsuario->num_rows;
  $db_connection->close();
  while ($row = mysqli_fetch_array($getUsuario)) {
    $id_dep = $row['id_departamento'];
  }

  require('database/db.php');
  $stmt = $db_connection->prepare("CALL SelobtenerPreguntas(?);");
  $stmt->bind_param('i', $id_dep); 
  $stmt->execute();
  $getDepartamento = $stmt->get_result();
  $qtyResults = $getDepartamento->num_rows;
  $db_connection->close();
  while ($row = mysqli_fetch_array($getDepartamento)) {
    $criterios = $row['criterios'];
    $estado = $row['estado_evidencia'];
    $evidencia = $row['evidencia_requerida'];
    array_push($array,$criterios, $estado, $evidencia);
  }
?>

<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/estilo_checkbox.css">
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/estilo_boton.css">
<div class="titulo">
    <h1 class="m-0">Responder evaluación</h1>
</div>
<style>
  .titulo{
    font-size: 25px;
    padding:15px 15px;
}
</style>

  <?php if($array[1] == 1){$obli = "obligatoria";}else{$obli = "";}
   if($array[4] == 1){$obli2 = "obligatoria";}else{$obli2 = "";}
   if($array[7] == 1){$obli3 = "obligatoria";}else{$obli3 = "";}
   if($array[10] == 1){$obli4 = "obligatoria";}else{$obli4= "";}
   if($array[13] == 1){$obli5 = "obligatoria";}else{$obli5 = "";}    

   if($array[16] == 1){$obli6 = "obligatoria";}else{$obli6 = "";}  
   if($array[19] == 1){$obli7 = "obligatoria";}else{$obli7 = "";}  
   if($array[22] == 1){$obli8 = "obligatoria";}else{$obli8 = "";}  
   if($array[25] == 1){$obli9 = "obligatoria";}else{$obli9 = "";}  
   if($array[28] == 1){$obli10 = "obligatoria";}else{$obli10 = "";}  


   if($array[31] == 1){$obl11 = "obligatoria";}else{$obli11 = "";}  
   if($array[34] == 1){$obli12 = "obligatoria";}else{$obli12 = "";}  
   if($array[37] == 1){$obli13 = "obligatoria";}else{$obli13 = "";}  
   if($array[40] == 1){$obli14 = "obligatoria";}else{$obli14 = "";}  
   if($array[43] == 1){$obli15 = "obligatoria";}else{$obli15 = "";}  

  ?>
<?php
if(!isset($_GET["ocultar"])){ 



?>


<!---Tabla 1 -->

<form action="bll/responder_evaluacion.php?id=<?php echo 1;?>"  method="POST">
<h2>Tabla de Información Personal</h2>
     
   <ul class="responsive-table">
     <li class="table-header">
       <div class="col col-1">Opciones</div>
       <div class="col col-3">Criterio</div>
       <div class="col col-2">Señale la opcion que describa mejor su situacion <br>
        actual o la de su entidad marcando la celda <br>
         correspondiente en la columna de la derecha</div>
       <div class="col col-4">Evidencia</div>
     </li>
   
     <li class="table-row">
       <div class="col col-1" data-label="Opciones">a</div>
       <div class="col col-2" data-label="Criterio"><textarea name="txt1" id="styled" onfocus="this.value=''; setbg('#e5fff3');" disabled="true" onblur="setbg('white')"><?php echo $array[0]; ?></textarea></div>
       <div class="col col-3" data-label="Marcar">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch1" value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Evidencia"><textarea name="txt2" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')"placeholder="<?php echo $obli; ?>"><?php echo $obli; ?></textarea></div>
       
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Opciones">b</div>
       <div class="col col-2" data-label="Criterio"><textarea name="txt3" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white') " disabled="true"><?php echo $array[3]; ?></textarea></div>
       <div class="col col-3" data-label="Marcar">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch2"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Evidencia"><textarea name="txt4" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="<?php echo $obli2; ?>"><?php echo $obli2; ?></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Opciones">c</div>
       <div class="col col-2" data-label="Criterio"><textarea name="txt5" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" disabled="true"><?php echo $array[6]; ?></textarea></div>
       <div class="col col-3" data-label="Marcar">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch3"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Evidencia"><textarea name="txt6" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="<?php echo $obli3;  ?>"><?php echo $obli3; ?></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Opciones">d</div>
       <div class="col col-2" data-label="Criterio"><textarea name="txt7" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" disabled="true"><?php echo $array[9]; ?></textarea></div>
       <div class="col col-3" data-label="Marcar">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch4"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Evidencia"><textarea name="txt8" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="<?php echo$obli4;  ?>"><?php echo $obli4; ?></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Opciones">e</div>
       <div class="col col-2" data-label="Criterio"><textarea name="txt9" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" disabled="true"><?php echo $array[12]; ?></textarea></div>
       <div class="col col-3" data-label="Marcar">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch5"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Evidencia"><textarea name="txt10" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="<?php echo $obli5; ?>"><?php echo $obli5; ?></textarea></div>
     </li>
     <style>
        .a{
            background: white;
            border: none;
            

        }
        .btn{
              margin-bottom: 50px;
            }
    </style>
    <div class="btn">
        <input type="submit" value="Crear" class="a">
      <div class="dot"></div>
    </div>



<!---Tabla 2-->

</form>
<?php }elseif(isset($_GET['ocultar']) && isset($_GET['ocultar']) == 1){ ?>
<form action="bll/responder_evaluacion.php?id=<?php echo 2;?>"  action="POST">
<h2>Tabla de Información Personal</h2>
     
   <ul class="responsive-table">
     <li class="table-header">
       <div class="col col-1">Opciones</div>
       <div class="col col-2">Señale la opcion que describa mejor su situacion actual o la de su entidad marcando la celda correspondiente en la columna de la derecha</div>
       <div class="col col-3">Marcar</div>
       <div class="col col-4">Evidencia</div>
     </li>
   
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">a</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt1" id="styled" onfocus="this.value=''; setbg('#e5fff3');" disabled="true" onblur="setbg('white')"><?php echo $array[15]; ?></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch1" value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt2" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')"placeholder="Ingrese el link de la evidencia"><?php echo $obli6; ?></textarea></div>
       
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">b</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt3" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white') " disabled="true"><?php echo $array[18]; ?></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch2"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt4" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"><?php echo $obli7; ?></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">c</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt5" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" disabled="true"><?php echo $array[21]; ?></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch3"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt6" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"><?php echo $obli8; ?></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">d</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt7" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" disabled="true"><?php echo $array[24]; ?></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch4"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt8" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"><?php echo $obli9; ?></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">e</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt9" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" disabled="true"><?php echo $array[27]; ?></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch5"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt10" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"><?php echo $obli10; ?></textarea></div>
     </li>
     <input type="submit">


</form>

<!--(3 tabla aqui)-->


<?php }?>

<?php include("includes/footer.php") ?>