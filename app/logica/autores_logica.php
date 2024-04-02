<?php

require_once ("../app/configuracion/conexion.php");

class Autor{

    private $objconexion;
    private $pdo;

    public function __construct(){
        $this->objconexion = new Conexion();
    }
    public function mostrarAutores(){

        $this->pdo = $this->objconexion->abrirConexion();

        try {
            $consulta = $this->pdo->query("SELECT id_autor, nombre, apellido, telefono, direccion, ciudad, genero, id_imagen FROM autores");
        } catch (PDOException $e) {
            echo '<div class="errores-contenedor">';
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            echo '</div>';
        }
        
        return $consulta;
    }


}