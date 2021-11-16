<?php
include("includes/header.php");//includ de el header
?>
<link rel="stylesheet" href="css/EstilosCart.css">
<?php 
 include('database/db.php');
$stmt = $db_connection->prepare("SELECT * FROM departamentos");
$stmt->execute();
$getDepto = $stmt->get_result();
$qtyResults = $getDepto->num_rows;
$db_connection->close();
//generacion de array aleatorio
$count=11;//numero de imagenes
$rand = range(1, $count);
shuffle($rand);
$NumImg=array();
for($i=0;$i<$count;$i++){
array_push($NumImg,$rand[$i]);
$idx=0;//variable para controlar las posiciones del arreglo
}
?>
<div class="container__card">
        <?php while($datos=mysqli_fetch_array($getDepto)){?>
            <?php //$img=rand(1, 11);
            ?>
        <div class="card__father">
            <div class="card">
                <div class="card__front" style="background-image: url(img/img<?php echo $NumImg[$idx];$idx++; ?>.jpg">
                    <div class="bg"></div>
                    <div class="body__card_front">
                        <h1><?php echo $datos['siglas_departamento'];echo "-"; echo $datos['nombre_departamento']; ?></h1>
                    </div>
                </div>
                <div class="card__back">
                    <div class="body__card_back">
                        <h1><?php echo $datos['nombre_departamento'] ?></h1>
                        <p><?php echo $datos['siglas_departamento'] ?></p>
                        <a href="Inspeccion_evaluacion.view.php?id_depto=<?php echo $datos['id_departamento'];?>&depa=<?php echo $datos['nombre_departamento'];?>"><input type="button" value="Leer Más"></a>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
</div>

