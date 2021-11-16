<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_select.css">
<link rel="stylesheet" href="css/estilo_crear_evaluacion.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/estilo_checkbox.css">
<link rel="stylesheet" href="css/estilo_boton.css">




<?php if (isset($_GET['id_componente'])) {
	$idcomponent = $_GET['id_componente'];

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<div class="titulo">
    <h1 class="m-0">Crear evaluación</h1>
</div>
<style>
  .titulo{
    font-size: 25px;
    padding:15px 15px;
}
</style>

<form action="bll/registrar_evaluacion.php" method="POST">
	<div class="contenedor">
	<div class="select">
	<div class="areas">
		<input type="hidden" name="comp" value="<?php if (isset($idcomponent)) { echo($idcomponent); } ?>">
				<label for="cars">Seleccione el componente:</label>
				<!--Redirige si selecciona un elemento del combo box -->
				<select name="select2" onchange="javascript:location.href = this.value;">
					<option selected="true" disabled="true" value=""></option>
					<?php if(isset($_GET['id_componente']))?>
					<?php while ($row = mysqli_fetch_array($getComponentes)) { ?>
						<option value="crear_evaluacion.php?id_componente=<?php echo $row['id_componente'] ?>">
						 <?php echo $row['nombre_componente'] ?> </option>

					<?php } ?>

				</select>
			</div>

		
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
		<div class="container">
		<div class="select">
        <div class="areas">
		<label for="cars">Seleccione el eje:</label>
				<!--Redirige si selecciona un elemento del combo box -->
				<select name="nombreEje">
				<?php if(isset($idcomponent)) {while ($row = mysqli_fetch_array($ejes)) { ?>
				
						<option ><?php echo $row['nombre_eje'] ?></option>
					<?php }} ?>
				</select>
				</div>
				</div>
			<h2 >Crear evaluación <style>h2{font-size: 35px;}</style></h2>
			<div class="container">
   
  
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Opcion</div>
        <div class="col col-2">Criterios</div>
        <div class="col col-3">Evidencia Requerida</div>
        <div class="col col-4">Evidencia obligatoria</div>
      </li>
    
      <li class="table-row">
        <div class="col col-1" data-label="Opcion">a</div>
        <div class="col col-2" data-label="Criterios"><textarea name="txt1" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-3" data-label="Evidencia Requerida"><textarea name="txt2" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-4" data-label="Evidencia obligatoria">
		<label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch1" value="1"><div class="b-input"></div></label>
		</div>
      </li>
	  <li class="table-row">
        <div class="col col-1" data-label="Opcion">b</div>
        <div class="col col-2" data-label="Criterios"><textarea name="txt3" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-3" data-label="Evidencia Requerida"><textarea name="txt4" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-4" data-label="Evidencia obligatoria">
		<label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch2"  value="1"><div class="b-input"></div></label>
		</div>
      </li>
	  <li class="table-row">
        <div class="col col-1" data-label="Opcion">c</div>
        <div class="col col-2" data-label="Criterios"><textarea name="txt5" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-3" data-label="Evidencia Requerida"><textarea name="txt6" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-4" data-label="Evidencia obligatoria">
		<label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch3"  value="1"><div class="b-input"></div></label>
		</div>
      </li>
	  <li class="table-row">
        <div class="col col-1" data-label="Opcion">d</div>
        <div class="col col-2" data-label="Criterios"><textarea name="txt7" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-3" data-label="Evidencia Requerida"><textarea name="txt8" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-4" data-label="Evidencia obligatoria">
		<label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch4"  value="1"><div class="b-input"></div></label>
		</div>
      </li>
	  <li class="table-row">
        <div class="col col-1" data-label="Opcion">e</div>
        <div class="col col-2" data-label="Criterios"><textarea name="txt9" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-3" data-label="Evidencia Requerida"><textarea name="txt10" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Ingrese los criterios aquí</textarea></div>
        <div class="col col-4" data-label="Evidencia obligatoria">
		<label class="b-contain"><span>Tiene esta caracteristica</span><input type="checkbox" name="ch5"  value="1"><div class="b-input"></div></label>
		</div>
      </li>

     
  </div>




			<div class="abajo">
				<input type="hidden" name="componente" value="<?php echo $getDataEjes['nombre_eje'] ?>">
				<style>
        .a{
            background: white;
            border: none;

        }
		.abajo{
			position: absolute;
			top: 1500px;
			left: 650px;
		}
    </style>
    <div class="btn">
        <input type="submit" value="Crear" class="a">
      <div class="dot"></div>
    </div>
			</div>
		</div>


	</div>

</form>



<?php include("includes/footer.php") ?>