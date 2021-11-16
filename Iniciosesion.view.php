<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<?php if(isset($_SESSION['usuario'])){
    echo '<div class="alert alert-danger">No has iniciado session, en 3 segundos será redireccionado</div>';
    header("Refresh: 2; URL=http://localhost/Final/index.php");
       
}else{?>


<?php
include("includes/header.php");//includ de el header
?>
<script src="js/Iniciosesion.js"></script>
<link rel="stylesheet" href="css/Estiloregistro.css">
<link rel="stylesheet" href="css/estilo_boton.css">

<p id="mensaje">
    <?php
    if(isset($_SESSION['mensaje'])){
    //imprimo el mensaje de usuario registrado
    echo $_SESSION['mensaje'];
    $_SESSION['mensaje']="";
    }
    ?>
</p>

<section>
        <form method="POST" action="bll/Programacion_iniciosesion.php">
        <input class="Entradas" type="text" id="correo" name="correo" placeholder="Correo Electrónico">
        <span class="error" id="error1">*El correo no es valido.</span>
        <br>
        <br>
        <br>

        <input  class="Entradas" type="password" id="contra" name="contra" placeholder="Contraseña">
        <span class="error" id="error2">*La contraseña no es valida.</span>
        <br>
        <br>
        <br>
        <style>
        .a{
            background: white;
            border: none;
            
        }
        .btn{
            position: absolute;
            top:400px;
            margin-left: 800px;
            
            
        }
    </style>
    <div class="btn">
        <input type="submit" value="Crear" class="a">
      <div class="dot"></div>
    </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
        </form>
    </section>
    <footer>
        <div class="FooterNegro">
            <P>2021 Administración y programación de sitios web</P>
        </div>
    </footer>
<?php } ?>