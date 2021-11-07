<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/style.css">

<div class="col-sm-6">
    <h1 class="m-0">Gestión de Permisos</h1>
</div>
<div>
    <h3 class="m-0">Rol actual:</h3>
</div>

<div class="container">
    <h2>Permisos del rol</h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Id permiso</div>
            <div class="col col-2">Nombre del permiso</div>
            <div class="col col-3">Agregar</div>
            <div class="col col-3">Remover</div>
        </li>
        <li class="table-row">
            <div class="col col-1" data-label="Customer Name">1</div>
            <div class="col col-2" data-label="Customer Name">ver roles</div>
            <div class="col col-3"><a href="bll/agregar_permiso_rol.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-plus" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <line x1="9" y1="12" x2="15" y2="12" />
                        <line x1="12" y1="9" x2="12" y2="15" />
                    </svg></a>
            </div>
            <div class="col col-4">
                <a href="bll/eliminar_permisos.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="9" y1="12" x2="15" y2="12" />
                    </svg></a>


            </div>


</div>

</div>

</li>


</div>





<?php include("includes/footer.php") ?>