<?php

class ProveedorModel
{
    private $conexionModel;
    public function crearProveedor($nombre, $contacto)
    {
        $sql = "INSERT INTO proveedores (Nombre, Contacto) 
                VALUES (?, ?)";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("ss", $nombre, $contacto);
        return $stmt->execute();
    }

    public function obtenerProveedores()
    {
        $sql = "SELECT * FROM proveedores";
        $result = $this->conexionModel->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerProveedorPorId($id_proveedor)
    {
        $sql = "SELECT * FROM proveedores WHERE ID_Proveedor = ?";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("i", $id_proveedor);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizarProveedor($id_proveedor, $nombre, $contacto)
    {
        $sql = "UPDATE proveedores SET Nombre = ?, Contacto = ? 
                WHERE ID_Proveedor = ?";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $contacto, $id_proveedor);
        return $stmt->execute();
    }

    public function eliminarProveedor($id_proveedor)
    {
        $sql = "DELETE FROM proveedores WHERE ID_Proveedor = ?";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("i", $id_proveedor);
        return $stmt->execute();
    }
}
