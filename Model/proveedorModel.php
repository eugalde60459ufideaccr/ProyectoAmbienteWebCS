<?php

class ProveedorModel
{
    private $conn;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Método para crear un nuevo proveedor
    public function crearProveedor($nombre, $contacto)
    {
        $stmt = $this->conn->prepare("INSERT INTO proveedor (Nombre, Contacto) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $contacto);
        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    // Método para obtener todos los proveedores
    public function obtenerProveedores()
    {
        $result = $this->conn->query("SELECT * FROM proveedor");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Método para obtener un proveedor específico por su ID
    public function obtenerProveedorPorId($id_proveedor)
    {
        $stmt = $this->conn->prepare("SELECT * FROM proveedor WHERE ID_Proveedor = ?");
        $stmt->bind_param("i", $id_proveedor);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Método para actualizar un proveedor
    public function actualizarProveedor($id_proveedor, $nombre, $contacto)
    {
        $stmt = $this->conn->prepare("UPDATE proveedor SET Nombre = ?, Contacto = ? WHERE ID_Proveedor = ?");
        $stmt->bind_param("ssi", $nombre, $contacto, $id_proveedor);
        return $stmt->execute();
    }

    // Método para eliminar un proveedor
    public function eliminarProveedor($id_proveedor)
    {
        $stmt = $this->conn->prepare("DELETE FROM proveedor WHERE ID_Proveedor = ?");
        $stmt->bind_param("i", $id_proveedor);
        return $stmt->execute();
    }
}
