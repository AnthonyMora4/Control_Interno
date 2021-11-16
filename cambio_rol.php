<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/estilo_crear_rol.css">
<link rel="stylesheet" href="css/estilo_select.css">

<?php
require('database/db.php');
$stmt = $db_connection->prepare("CALL SelRoles();");
$stmt->execute();
$getRol = $stmt->get_result();
$qtyResults = $getRol->num_rows;
$db_connection->close();
?>

<?php if(isset($_GET['usuario'])){ ?>

<form action="bll/cambio_rol.php" method="post">
  <div class="contenedor">
    <div class="nombre">
      <h2>Usuario:</h2>

      <input readonly class="Entradas" type="text" id="user" name="user" value="<?php echo $_GET['usuario']?>" >
    </div>
    <div class="select">
        
			<div class="areas">
				<label for="cars">Seleccione el rol:</label>
                <style>
                        .Entradas {
                            margin-bottom: 90px;
                           
                        }
                        .crear{
                            margin-bottom: 100px;
                        }
                    
                </style>

				<select name="rol" id="c">
					<option selected="true" disabled="true" value=""></option>
          <?php while ($row = mysqli_fetch_array($getRol)) { ?>
						<option><?php echo $row['nombre_rol']?></option>
            <?php }?>
				</select>
			</div>
    </div>
    <div class="crear">
      <input class="Boton" type="submit" id="btnregistrar" name="btnregistrar" value="Cambiar rol">
    </div>
  </div>

  <div id="s">
      
  </div>
  <?php }?>
</form>

