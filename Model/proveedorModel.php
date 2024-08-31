<?php

class ProveedorModel {
    private $conn;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para crear un nuevo proveedor
    public function crearProveedor($nombre, $contacto) {
        $stmt = $this->conn->prepare("INSERT INTO proveedor (Nombre, Contacto) VALUES (?, ?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $contacto);
        if ($stmt->execute()) {
            return $this->conn->lastInsertId(); // Retorna el ID del proveedor insertado
        } else {
            return false;
        }
    }

    // Método para obtener todos los proveedores
    public function obtenerProveedores() {
        $stmt = $this->conn->prepare("SELECT * FROM proveedor");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un proveedor específico por su ID
    public function obtenerProveedorPorId($id_proveedor) {
        $stmt = $this->conn->prepare("SELECT * FROM proveedor WHERE ID_Proveedor = ?");
        $stmt->bindParam(1, $id_proveedor);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un proveedor
    public function actualizarProveedor($id_proveedor, $nombre, $contacto) {
        $stmt = $this->conn->prepare("UPDATE proveedor SET Nombre = ?, Contacto = ? WHERE ID_Proveedor = ?");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $contacto);
        $stmt->bindParam(3, $id_proveedor);
        return $stmt->execute();
    }

    // Método para eliminar un proveedor
    public function eliminarProveedor($id_proveedor) {
        $stmt = $this->conn->prepare("DELETE FROM proveedor WHERE ID_Proveedor = ?");
        $stmt->bindParam(1, $id_proveedor);
        return $stmt->execute();
    }
}
