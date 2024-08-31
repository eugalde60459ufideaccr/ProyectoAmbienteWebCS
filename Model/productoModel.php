<?php
<<<<<<< HEAD
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
=======

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
>>>>>>> 13b16c5017c94bb2cee55021956f56a044dbfeb1
    }

    public function obtenerProductos()
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 13b16c5017c94bb2cee55021956f56a044dbfeb1
    }

    public function eliminarProducto($id_producto)
    {
<<<<<<< HEAD
        try {
            $sql = "DELETE FROM producto WHERE ID_Producto = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$id_producto]);
        } catch (PDOException $e) {
            echo "Error al eliminar el producto: " . $e->getMessage();
            return false;
        }
=======
        $sql = "DELETE FROM producto WHERE ID_Producto = ?";
        $stmt = $this->conexionModel->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        return $stmt->execute();
>>>>>>> 13b16c5017c94bb2cee55021956f56a044dbfeb1
    }
}
