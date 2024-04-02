<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería SS</title>
    <link rel="shortcut icon" href="..\estaticos\imagenes\icono.png">
    <link rel="stylesheet" href="..\estaticos\css\index.css">
    <link rel="stylesheet" href="..\estaticos\css\contacto.css">
    <link rel="stylesheet" href="..\estaticos\css\menu.css">
    <link rel="stylesheet" href="..\estaticos\css\pie.css">
</head>
<body>

<?php
include("../reutilizables/menu.php");
?>
    <h1 class="titulo_lateral izquierdo">Formulario</h1>
    <h1 class="titulo_lateral derecho">de Contacto</h1>
    <h1 class="titulo"> Tu opinión cuenta</h1>
    <div class="formulario-contenedor">
        <form method="POST" id="formulario">
            <div class="datos_personales-contenedor">
                <div>
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre"" required>
                </div>
                <div>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="Correo"" required>
                </div>
            </div>   
            <div class="comentario-contenedor">
                <div>
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" placeholder="Asunto"" required>
                </div>
                <div>
                    <label for="comentario">Comentario</label>
                    <textarea id="comentario" name="comentario" rows="4" placeholder="Comentario" required></textarea>
                </div>
                <div>
            </div>     
            
            <button type="submit" name="enviar" class="boton">Enviar <i class="fa-solid fa-arrow-right"></i></button>
        </form>
    </div>
    

    <?php
        include("../app/logica/procesar_formulario_contacto.php");
    ?>
    
<script src="https://kit.fontawesome.com/c7150968fd.js" crossorigin="anonymous"></script>
</body>
</html>