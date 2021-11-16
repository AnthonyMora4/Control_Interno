<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_tarjeta.css">
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_select.css">
<link rel="stylesheet" href="css/estilo_ver_resultados.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<div class="titulo">
    <h1 class="m-0">Informe general de evaluaciones</h1>
</div>
<style>
  .titulo{
    font-size: 25px;
    padding:15px 15px;
}
</style>

<?php
require('database/db.php');
$stmt = $db_connection->prepare("CALL SelDepartamentos();");
$stmt->execute();
$getDepartamento = $stmt->get_result();
$qtyResults = $getDepartamento->num_rows;
$db_connection->close();
?>
<div class="contenedor">
<div class="select">
			<div class="areas">
				<label for="cars">Seleccione el departamento:</label>

				<select name="select1">
					<option selected="true" disabled="true" value=""></option>
					<?php while ($row = mysqli_fetch_array($getDepartamento)) { ?>
						<option><?php echo $row['nombre_departamento'] ?></option>
					<?php } ?>
				</select>
			</div>
    </div>
    </div>

<div class="container">
  <div class="card">
    <div class="box">
      <div class="content">
        <h3>Resumen</h3>
        <p>Ambiente de control: <br>
         Valoración del riesgo: <br>
         Actividades de control: <br>
        Sistemas ed informacion: <br>
        Seguimiento del SCI:</p>
        <a href="ver_resultados.php?res=<?php echo 1 ?>">Detalle del puntaje obtenido</a>
      </div>
    </div>
  </div>
  </div>

<?php if(isset($_GET['res'])){?>
  <div class="tabla">
  <h2>Análisis de resultados</h2>
   
  
   <ul class="responsive-table">
     <li class="table-header">
       <div class="col col-1">Opciones</div>
       <div class="col col-2">Criterios</div>
       <div class="col col-3">Evidencia Requerida</div>
       <div class="col col-4">Evidencia obligatoria</div>
     </li>
   
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">a</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt1" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-3" data-label="Amount"><textarea name="txt2" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-4" data-label="Payment Status">
       <label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch1" value="1"><div class="b-input"></div></label>
       </div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">b</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt3" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-3" data-label="Amount"><textarea name="txt4" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-4" data-label="Payment Status">
       <label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch2"  value="1"><div class="b-input"></div></label>
       </div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">c</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt5" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-3" data-label="Amount"><textarea name="txt6" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-4" data-label="Payment Status">
       <label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch3"  value="1"><div class="b-input"></div></label>
       </div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">d</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt7" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-3" data-label="Amount"><textarea name="txt8" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-4" data-label="Payment Status">
       <label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch4"  value="1"><div class="b-input"></div></label>
       </div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">e</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt9" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-3" data-label="Amount"><textarea name="txt10" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
       <div class="col col-4" data-label="Payment Status">
       <label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch5"  value="1"><div class="b-input"></div></label>
       </div>
     </li>
     <?php }?>











  </div>

  <?php include("includes/footer.php") ?>