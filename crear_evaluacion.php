<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_select.css">
<link rel="stylesheet" href="css/estilo_crear_evaluacion.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/estilo_checkbox.css">

<?php if (isset($_GET['id_componente'])) {
	$idcomponent = $_GET['id_componente'];
	var_dump($idcomponent);

require('database/db.php');
$stmt = $db_connection->prepare("CALL SelEjesPorComponente(?);");
$stmt->bind_param('i', $idcomponent); 
$stmt->execute();
$ejes = $stmt->get_result();
$qtyResults = $ejes->num_rows;
$db_connection->close();

} ?>
<?php
require('database/db.php');
$stmt = $db_connection->prepare("CALL SelDepartamentos();");
$stmt->execute();
$getDepartamento = $stmt->get_result();
$qtyResults = $getDepartamento->num_rows;
$db_connection->close();
?>

<?php
require('database/db.php');
$stmt = $db_connection->prepare("CALL SelOpciones();");
$stmt->execute();
$getOpcion = $stmt->get_result();
$qtyResults = $getOpcion->num_rows;
$db_connection->close();
?>

<?php
require('database/db.php');
$stmt = $db_connection->prepare("CALL SelComponentes();");
$stmt->execute();
$getComponentes = $stmt->get_result();
$qtyResults = $getComponentes->num_rows;
$db_connection->close();
?>

<?php
require('database/db.php');
$stmt = $db_connection->prepare("CALL SelEjes();");
$stmt->execute();
$getEjes = $stmt->get_result();
$qtyResults = $getEjes->num_rows;
$db_connection->close();
?>


<form action="bll/registrar_evaluacion.php" method="POST">
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

			<div class="areas">
				<label for="cars">Seleccione el componente:</label>
				<!--Redirige si selecciona un elemento del combo box -->
				<select name="select2" onchange="javascript:location.href = this.value;">
					<option selected="true" disabled="true" value=""></option>
					<?php while ($row = mysqli_fetch_array($getComponentes)) { ?>
						<option value="crear_evaluacion.php?id_componente=<?php echo $row['id_componente'] ?>">
							<?php echo $row['nombre_componente'] ?> </option>

					<?php } ?>

				</select>
			</div>


		</div>
		<div class="container">
		<label for="cars">Seleccione el eje:</label>
				<!--Redirige si selecciona un elemento del combo box -->
				<select name="nombreEje">					
					<?php if(isset($idcomponent)) {while ($row = mysqli_fetch_array($ejes)) { ?>
						<option ><?php echo $row['nombre_eje'] ?></option>
					<?php }} ?>
				</select>
			<h2>Crear evaluación</h2>
			<div class="container">
    <h2>Tabla de Información Personal</h2>
   
  
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

     
  </div>




			<div class="abajo">
				<input type="hidden" name="componente" value="<?php echo $getDataEjes['nombre_eje'] ?>">
				<input class="Boton" type="submit" id="btnregistrar" name="btnregistrar" value="Crear rol">
			</div>
		</div>


	</div>

</form>



<?php include("includes/footer.php") ?>