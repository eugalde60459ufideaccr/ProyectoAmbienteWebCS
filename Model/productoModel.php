<?php
require_once('conexionModel.php');

class ProductoModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Conexion())->getConn();
    }

    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagen)
    {
        try {
            $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Categoria, ID_Proveedor, Imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagen]);
            return $this->conn->lastInsertId(); 
        } catch (PDOException $e) {
            echo "Error al crear producto: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerProductos()
    {
        try {
            $sql = "SELECT * FROM producto";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener productos: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerProductoPorId($id_producto)
    {
        try {
            $sql = "SELECT * FROM producto WHERE ID_Producto = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_producto]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el producto: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagen)
    {
        try {
            $sql = "UPDATE producto SET Nombre = ?, Descripcion = ?, Precio = ?, Stock = ?, ID_Categoria = ?, ID_Proveedor = ?, Imagen = ? WHERE ID_Producto = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagen, $id_producto]);
        } catch (PDOException $e) {
            echo "Error al actualizar el producto: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarProducto($id_producto)
    {
        try {
            $sql = "DELETE FROM producto WHERE ID_Producto = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$id_producto]);
        } catch (PDOException $e) {
            echo "Error al eliminar el producto: " . $e->getMessage();
            return false;
        }
    }

    // New methods to fetch Categorias and Proveedores
    public function obtenerCategorias()
    {
        try {
            $sql = "SELECT ID_Categoria, Nombre FROM categoria";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener categorias: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerProveedores()
    {
        try {
            $sql = "SELECT ID_Proveedor, Nombre FROM proveedor";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener proveedores: " . $e->getMessage();
            return false;
        }
    }
}
