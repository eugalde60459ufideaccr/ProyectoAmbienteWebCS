<?php
// Requerir el modelo de conexión para interactuar con la base de datos
require_once('conexionModel.php');

class ProveedorModel
{
    private $conn;

    // Constructor para establecer la conexión a la base de datos
    public function __construct()
    {
        $this->conn = (new Conexion())->getConn();
    }
    public function crearProveedor($nombre, $contacto)
    {
        try {
            $sql = "INSERT INTO proveedor (Nombre, Contacto) 
                VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$nombre, $contacto]);
            return $this->conn->lastInsertId(); // Retornar el ID de la última factura insertada
        } catch (PDOException $e) {
            echo "Error al crear factura: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerProveedores()
    {
        try {
            $sql = "SELECT * FROM proveedor";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener proveedores: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerProveedorPorId($id_proveedor)
    {
        try {
            $sql = "SELECT * FROM proveedor WHERE ID_Proveedor = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($id_proveedor);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el proveedor: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarProveedor($id_proveedor, $nombre, $contacto)
    {
        try {
            $sql = "UPDATE proveedor SET Nombre = ?, Contacto = ? 
                WHERE ID_Proveedor = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($nombre, $contacto, $id_proveedor);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el proveedor: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarProveedor($id_proveedor)
    {
        try {
            $sql = "DELETE FROM proveedor WHERE ID_Proveedor = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($id_proveedor);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el proveedor: " . $e->getMessage();
            return false;
        }
    }
}
