<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php session_start();?>
<?php if(isset($_SESSION['id_rol'])){ 
session_destroy();
echo '<div class="alert alert-success">Cerrando Sesion... , en 3 segundos será redireccionado</div>';
header("Refresh: 2; URL=http://localhost/Final/index.php");
}else {

echo '<div class="alert alert-danger">No has iniciado session, en 3 segundos será redireccionado</div>';
header("Refresh: 2; URL=http://localhost/Final/index.php");
    
} ?>


