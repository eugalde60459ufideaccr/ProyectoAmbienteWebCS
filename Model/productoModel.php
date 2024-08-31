<?php
require_once('conexionModel.php');
class ProductoModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new Conexion())->getConn();
    }
    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        try {
            $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Categoria, ID_Proveedor) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor]);
            return $this->conn->lastInsertId(); // Retornar el ID de la última proveedor insertada
        } catch (PDOException $e) {
            echo "Error al crear proveedor: " . $e->getMessage();
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

    public function actualizarProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        try {
            $sql = "UPDATE Producto SET Nombre = ?, Descripcion = ?, Precio = ?, Stock = ?, ID_Categoria = ?, ID_Proveedor = ? WHERE ID_Producto = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor]);
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
}
