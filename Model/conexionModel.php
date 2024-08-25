<?php
class Conexion {
    // Propiedades para la conexión a la base de datos
    private $host = "localhost";
    private $db = "ferre_express"; 
    private $user = "root";         
    private $pass = "";          
    private $conn;

    // Constructor para establecer la conexión a la base de datos
    public function __construct() {
        try {
            // Crear una nueva instancia de PDO con los parámetros especificados
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            // Configurar el modo de errores de PDO a excepción para un mejor manejo de errores
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Mostrar un mensaje de error si la conexión falla
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    // Método para retornar la conexión a la base de datos
    public function getConn() {
        return $this->conn;
    }
}
