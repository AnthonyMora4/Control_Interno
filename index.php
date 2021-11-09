<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_f.css">

<div class="img_principal" >
 
</div>

<div class="sobre_nosotros" >

</div>

<div class="objetivos" >

</div>

<div class="contactos" >

</div>

<div class="indicadores" >

</div>

<div class="final" >

</div>

<?php session_start();//necesitas declarar esto para reanudar la session?>
<p><?php echo $_SESSION['id_rol'];//aqui imprimes cualquier variable que necesites?></p>
<p><?php echo $_SESSION['usuario'];?></p>




<?php include("includes/footer.php") ?>