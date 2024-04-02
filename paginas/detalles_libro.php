<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería SS</title>
    <link rel="shortcut icon" href="..\estaticos\imagenes\icono.png">
    <link rel="stylesheet" href="..\estaticos\css\index.css">
    <link rel="stylesheet" href="..\estaticos\css\detalles_libro.css">
    <link rel="stylesheet" href="..\estaticos\css\menu.css">
    <link rel="stylesheet" href="..\estaticos\css\pie.css">
</head>
<body>
    
    <?php
        include("../reutilizables/menu.php");

    ?>

    <?php
        require_once "../app/logica/libros_logica.php";
        $id_libro= $_GET['id_libro'];
        $objlibro = new Libro();
        $detalles = $objlibro->mostrarDetallesLibro($id_libro);

        while($detalle = $detalles->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <h1 class="titulo-detalles"><a href="\ProyectoFinal\paginas\libros.php">Libros</a> | <span><?= $detalle['titulo']?></span></h1>
    <div class="detalles-contenedor">
        <h3>Descripcion</h3>
        <p><?= $detalle['notas']?></p>
        
        <div class="otros-contenedor">
            <div>    
                <h3>Tipo</h3>
                <p><?= $detalle['tipo']?></p>
            </div>
            <div>
                <h3>Publicador</h3>
                <p><?= $detalle['nombre_pub']?></p>
            </div>
            <div>
                <h3>Precio</h3>
                <p>$ <?= $detalle['precio']?></p>
            </div>
            <div>
                <h3>Total Ventas</h3>
                <p><?= $detalle['total_ventas']?></p>
            </div>
            <div>
                <h3>Fecha Publicación</h3>
                <p><?= $detalle['fecha_pub']?></p>
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
