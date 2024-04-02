<?php

require_once ("../app/configuracion/conexion.php");

$objconexion = new Conexion();
$pdo = $objconexion->abrirConexion();

if(isset($_POST['enviar'])){
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $asunto = trim($_POST['asunto']);
    $comentario = trim($_POST['comentario']);

    $errores = [];

    if(strlen($nombre) < 3){
        $errores[] = "Ingrese un nombre válido (mínimo 3 caracteres).";
    }

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        $errores[] = "Ingrese un correo válido.";
    }

    if(strlen($asunto) < 5){
        $errores[] = "Ingrese un asunto válido (mínimo 5 caracteres).";
    }

    if(strlen($comentario) < 10){
        $errores[] = "Ingrese un comentario válido (mínimo 10 caracteres).";
    }

    if(empty($errores)){
        $sql = "INSERT INTO contacto (nombre, correo, asunto, comentario, fecha)
                VALUES (:nombre, :correo, :asunto, :comentario, :fecha)";
        
        $fecha = date("Y-m-d");
        
        $sentencia= $pdo->prepare($sql);
        
        $datos = [
            'nombre' => $nombre,
            'correo' => $correo,
            'asunto' => $asunto,
            'comentario' => $comentario,
            'fecha' => $fecha
        ];

        try {
            $sentencia->execute($datos);
            echo '<div class="exito-contenedor">';
            echo "Su comentario se ha enviado correctamente.";
            echo '</div>';


        } catch (PDOException $e) {
            echo '<div class="errores-contenedor">';
            echo "Error al insertar datos: " . $e->getMessage();
            echo '</div>';
        }
    } else {
        // Mostrar errores de validación
        foreach($errores as $error){
            echo '<div class="errores-contenedor">';
            echo $error;
            echo '</div>';
        }
    }
}
?>
