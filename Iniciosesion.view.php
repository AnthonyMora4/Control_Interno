<?php
include("includes/header.php");//includ de el header
?>
<script src="js/Iniciosesion.js"></script>
<link rel="stylesheet" href="css/Estiloregistro.css">
<?php session_start();?>

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
        <form method="POST" action="php/Programacion_iniciosesion.php">
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
        <input  class="Boton" type="submit" id="btninicio" name="btninicio" value="Iniciar sesión">
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
