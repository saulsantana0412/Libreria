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

    <h1 class="titulo_lateral izquierdo">Libros</h1>
    <div class="tarjetas-contenedor">
    <?php
        require_once "../app/logica/libros_logica.php";

        $objlibro = new Libro();
        $libros = $objlibro->mostrarLibros();

        while($fila = $libros->fetch(PDO::FETCH_ASSOC)) {
    ?>

    <div class="tarjeta-fondo">
        <div class ="tarjeta-contenedor">
            <div class="informacion_libro-contenedor">
                    <div class="datos-contenedor">
                        <h3><?= $fila['titulo']?></h3>
                        <p class="etiqueta"><?= $fila['tipo']?></p>
                        <p><?= $fila['notas']?></p>
                    </div>
                    <div class="otros-contenedor">
                        <h3> $ <?= $fila['precio']==!null?$fila['precio']:'-' ?></h3>
                        <a href="detalles_libro.php?id_libro=<?= $fila['id_titulo']?>" class="boton">Ver más detalles <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
            </div>

        </div>
    </div>

    <?php } ?>

    </div>

    <?php
        include("../reutilizables/pie.php");
    ?>
</body>
</html>