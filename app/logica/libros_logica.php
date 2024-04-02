<?php

require_once ("../app/configuracion/conexion.php");

class Libro{

    private $objconexion;
    private $pdo;
    public function __construct(){
        $this->objconexion = new Conexion();
    }
    public function mostrarLibros(){

        $this->pdo  = $this->objconexion->abrirConexion();

        try {
            $consulta = $this->pdo ->query("SELECT  t.id_titulo, t.titulo, t.tipo, p.nombre_pub, t.precio, t.avance, t.total_ventas, t.notas, t.fecha_pub, t.contrato
            FROM titulos t
            left JOIN publicadores p
            ON t.id_pub = p.id_pub");
        } catch (PDOException $e) {
            echo '<div class="errores-contenedor">';
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            echo '</div>';        }
        
        return $consulta;
    }

}