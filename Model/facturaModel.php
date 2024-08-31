<?php
// Requerir el modelo de conexión para interactuar con la base de datos
require_once('conexionModel.php');

class FacturaModel {
    private $conn;

    // Constructor para establecer la conexión a la base de datos
    public function __construct() {
        $this->conn = (new Conexion())->getConn();
    }

    // Método para crear una nueva factura
    public function crearFactura($fecha, $total, $id_usuario) {
        try {
            $sql = "INSERT INTO Factura (Fecha, Total, ID_Usuario) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$fecha, $total, $id_usuario]);
            return $this->conn->lastInsertId(); // Retornar el ID de la última factura insertada
        } catch (PDOException $e) {
            echo "Error al crear factura: " . $e->getMessage();
            return false;
        }
    }

    // Método para obtener todas las facturas
    public function obtenerFacturas() {
        try {
            $sql = "SELECT * FROM Factura";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener facturas: " . $e->getMessage();
            return false;
        }
    }

    // Método para obtener una factura específica por su ID
    public function obtenerFacturaPorId($id_factura) {
        try {
            $sql = "SELECT * FROM Factura WHERE ID_Factura = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_factura]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la factura: " . $e->getMessage();
            return false;
        }
    }

    // Método para actualizar una factura
    public function actualizarFactura($id_factura, $fecha, $total, $id_usuario) {
        try {
            $sql = "UPDATE Factura SET Fecha = ?, Total = ?, ID_Usuario = ? WHERE ID_Factura = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$fecha, $total, $id_usuario, $id_factura]);
        } catch (PDOException $e) {
            echo "Error al actualizar la factura: " . $e->getMessage();
            return false;
        }
    }

    // Método para eliminar una factura
    public function eliminarFactura($id_factura) {
        try {
            $sql = "DELETE FROM Factura WHERE ID_Factura = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$id_factura]);
        } catch (PDOException $e) {
            echo "Error al eliminar la factura: " . $e->getMessage();
            return false;
        }
    }
}
