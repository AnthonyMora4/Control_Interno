<?php include('../database/db.php');?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php  
    $correo = $_POST['txtCorreo'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $telefono = $_POST['txtTelefono'];
    $password = $_POST['txtPassword'];
  
    if(strlen($correo) == 0 || strlen($nombre) == 0 || strlen($apellido) == 0
     || strlen($telefono) == 0 ||  strlen($password) == 0)
    {
       echo '<div class="alert alert-danger">No se permiten campos vacios, 3 segundos será redireccionado</div>';
        header("Refresh: 2; URL=http://localhost/ProyectoAPSW/Control_interno/actualizar_usuario_view.php");
    }
    else
    {    
            // Metodo almacenado      

            $stmt = $db_connection->prepare("CALL upUsuario(?,?,?,?,?);");
            $stmt->bind_param('sssss',$nombre,$apellido,$telefono,$password,$correo);
            $stmt->execute();
            $db_connection->close();
        
            echo '<div class="alert alert-success">Datos actualizados, en 3 segundos será redireccionado</div>';
            header("Refresh: 2; URL=http://localhost/ProyectoAPSW/Control_interno/actualizar_usuario_view.php");           
    }
    
 

?>