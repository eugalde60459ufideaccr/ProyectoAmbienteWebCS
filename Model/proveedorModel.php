<?php
require_once('conexionModel.php');

class ProveedorModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Conexion())->getConn();
    }

    // Función para obtener todos los proveedores
    public function obtenerProveedores()
    {
        try {
            $query = "SELECT * FROM proveedor";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener proveedores: " . $e->getMessage();
            return false;
        }
    }

    // Función para crear un nuevo proveedor
    public function crearProveedor($nombre, $contacto)
    {
        try {
            $query = "INSERT INTO proveedor (Nombre, Contacto) VALUES (:nombre, :contacto)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':contacto', $contacto, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear proveedor: " . $e->getMessage();
            return false;
        }
    }

    // Función para actualizar un proveedor
    public function actualizarProveedor($id, $nombre, $contacto)
    {
        try {
            $query = "UPDATE proveedor SET Nombre = :nombre, Contacto = :contacto WHERE ID_Proveedor = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':contacto', $contacto, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar proveedor: " . $e->getMessage();
            return false;
        }
    }

    // Función para eliminar un proveedor
    public function eliminarProveedor($id)
    {
        try {
            $query = "DELETE FROM proveedor WHERE ID_Proveedor = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar proveedor: " . $e->getMessage();
            return false;
        }
    }
}
