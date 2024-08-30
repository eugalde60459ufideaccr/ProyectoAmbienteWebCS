<?php

class ProductoModel
{
    private $conn;


    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Categoria, ID_Proveedor)
VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdiis", $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
        return $stmt->execute();
    }

    public function obtenerProductos()
    {
        $sql = "SELECT * FROM producto";
        $result = $this->conn->query($sql);
        return $result->fetch_all(PDO::FETCH_ASSOC);
    }

    function obtenerProductoPorId($id_producto)
    {
        $conn = (new Conexion())->getConn();
        $stmt = $conn->prepare("SELECT * FROM producto WHERE ID_Producto = :id_producto");
        $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $sql = "UPDATE producto SET Nombre = ?, Descripcion = ?, Precio = ?, Stock = ?, ID_Categoria = ?, ID_Proveedor = ?
WHERE ID_Producto = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdiisi", $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $id_producto);
        return $stmt->execute();
    }

    public function eliminarProducto($id_producto)
    {
        $sql = "DELETE FROM producto WHERE ID_Producto = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        return $stmt->execute();
    }
}
