<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería SS</title>
    <link rel="shortcut icon" href="..\estaticos\imagenes\icono.png">
    <link rel="stylesheet" href="..\estaticos\css\index.css">
    <link rel="stylesheet" href="..\estaticos\css\detalles_autor.css">
    <link rel="stylesheet" href="..\estaticos\css\menu.css">
    <link rel="stylesheet" href="..\estaticos\css\pie.css">
</head>
<body>
    
    <?php
        include("../reutilizables/menu.php");

    ?>

    <?php
        require_once "../app/logica/autores_logica.php";

        $id_autor = $_GET['id_autor'];

        $objautor = new Autor();
        $detalles = $objautor->mostrarDetallesAutor($id_autor);

        while($detalle = $detalles->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <h1 class="titulo-detalles"><a href="\ProyectoFinal\paginas\autores.php">Autores</a> | <span><?= $detalle['nombre'].' '.$detalle['apellido']?></span></h1>
    
    <div class="detalles_autor-contenedor">

    <div class="imagen_autor-contenedor">
    <img src="https://xsgames.co/randomusers/assets/avatars/<?=$detalle['genero']==1?'male':'female'?>/<?= $detalle['id_imagen']?>.jpg" alt="" srcset="">
    </div>
    <div class="datos_autor-contenedor">
        
        <h3>Biografia</h3>
        <p><?= $detalle['biografia']==!null?$detalle['biografia']:'Este autor aun no tiene biografia.'?></p>

        <div class="otros-contenedor">
            <div>
                <h3>Número de Teléfono</h3>
                <p><?= $detalle['telefono']?></p>
            </div>    
            <div>
                <h3>Dirección</h3>
                <p><?= $detalle['direccion']?></p>
            </div>
            <div>
                <h3>Ciudad</h3>
                <p><?= $detalle['ciudad']?></p>
            </div>
            <div>
                <h3>Estado</h3>
                 <p><?= $detalle['estado']?></p> 
            </div>
            <div>
                <h3>País</h3>
                <p><?= $detalle['pais']?></p>
            </div>
            <div>
                <h3>Código Postal</h3>
                <p><?= $detalle['cod_postal']?></p>
            </div>
        </div>
    </div>

    </div>
    

    <?php
        }
    ?>
    
    <?php
        include("../reutilizables/pie.php");
    ?>


<script src="https://kit.fontawesome.com/c7150968fd.js" crossorigin="anonymous"></script>
</body>
</html>