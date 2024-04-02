<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería SS</title>
    <link rel="stylesheet" href="..\estaticos\css\index.css">
</head>
<body>
    <?php
        include("../reutilizables/menu.php");
    ?>

    <h1 class="titulo_lateral izquierdo">Autores</h1>
    <div class="tarjetas-contenedor">
    <?php
        require_once "../app/logica/autores_logica.php";

        $objautor = new Autor();
        $autores = $objautor->mostrarAutores();

        while($fila = $autores->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <div class="tarjeta-fondo">
            <div class ="tarjeta-contenedor">
                <div class="imagen_perfil-contenedor">
                    <img src="https://xsgames.co/randomusers/assets/avatars/<?=$fila['genero']==1?'male':'female'?>/<?= $fila['id_imagen']?>.jpg" alt="" srcset="">
                </div>
                <div class="informacion_autor-contenedor">
                        <div class="datos-contenedor">
                            <h3><?= $fila['nombre'].' '.$fila['apellido']?></h3>
                            <p><i class="fa-solid fa-phone"></i> <?= $fila['telefono']?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?= $fila['direccion'].', '. $fila['ciudad']?></p>
                        </div>
                        <div class="boton-contenedor">
                            <a href="detalles_autor.php?id_autor=<?= $fila['id_autor']?>" class="boton">Conoce más <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                </div>

            </div>
        </div>

    <?php
        }
    ?>
        </div>
    <?php
        include("../reutilizables/pie.php");
    ?>
    
</body>
</html>