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

    public function mostrarDetallesAutor($id_autor){

        $this->pdo = $this->objconexion->abrirConexion();

        $consulta = "SELECT a.id_autor, a.nombre, a.apellido, a.telefono, a.direccion, a.ciudad, a.estado, a.pais, a.cod_postal, b.biografia, a.genero, a.id_imagen
        FROM autores a 
        LEFT JOIN biografias b ON a.id_autor = b.id_autor
        WHERE a.id_autor = :id_autor";

        $sentencia = $this->pdo->prepare($consulta);
        
        try {
            $sentencia->execute(['id_autor' => $id_autor]);
        } catch (PDOException $e) {
            echo '<div class="errores-contenedor">';
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            echo '</div>';
        }
        
        return $sentencia;
    }

}