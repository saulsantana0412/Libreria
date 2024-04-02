<?php

class Conexion {

    private $origen = "mysql:host=localhost;dbname=BD_Libreria";
    private $usuario = "root";
    private $contraseña = "";

    private $pdo;
    public function abrirConexion(){
        try {
            $this->pdo = new PDO($this->origen , $this->usuario, $this->contraseña);
        
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo '<div class="errores-contenedor">';
            echo "Error de conexión: " . $e->getMessage();
            echo '</div>';
        }
        return $this->pdo;
    }

    public function cerrarConexion(){
        $this->pdo =null;
    }
}



