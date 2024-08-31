<?php

class ProductoModel
{
    private $conexionModel;


    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Categoria, ID_Proveedor)
VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("ssdiis", $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
        return $stmt->execute();
    }

    public function obtenerProductos()
    {
        $sql = "SELECT * FROM producto";
        $result = $this->conexionModel->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerProductoPorId($id_producto)
    {
        $sql = "SELECT * FROM producto WHERE ID_Producto = ?";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $sql = "UPDATE producto SET Nombre = ?, Descripcion = ?, Precio = ?, Stock = ?, ID_Categoria = ?, ID_Proveedor = ?
WHERE ID_Producto = ?";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("ssdiisi", $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $id_producto);
        return $stmt->execute();
    }

    public function eliminarProducto($id_producto)
    {
        $sql = "DELETE FROM producto WHERE ID_Producto = ?";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        return $stmt->execute();
    }
}
