<?php
// hola
class ProductoModel
{
<<<<<<< HEAD
    private $conn;
=======
    private $ID_Producto;
    private $Nombre;
    private $Descripcion;
    private $Precio;
    private $Stock;
    private $ID_Categoria;
    private $ID_Proveedor;
>>>>>>> 7db6f8bac43c4c7edb0a74aad695c96ea29c0d39

    public function __construct($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $ID_Categoria, $ID_Proveedor)
    {
<<<<<<< HEAD
        $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Categoria, ID_Proveedor)
VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdiis", $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
        return $stmt->execute();
=======
        $this->ID_Producto = $ID_Producto;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Precio = $Precio;
        $this->Stock = $Stock;
        $this->ID_Categoria = $ID_Categoria;
        $this->ID_Proveedor = $ID_Proveedor;
>>>>>>> 7db6f8bac43c4c7edb0a74aad695c96ea29c0d39
    }

    public function getID_Producto()
    {
<<<<<<< HEAD
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
=======
        return $this->ID_Producto;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function getDescripcion()
    {
        return $this->Descripcion;
>>>>>>> 7db6f8bac43c4c7edb0a74aad695c96ea29c0d39
    }

    public function getPrecio()
    {
<<<<<<< HEAD
        $sql = "DELETE FROM producto WHERE ID_Producto = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        return $stmt->execute();
=======
        return $this->Precio;
    }

    public function getStock()
    {
        return $this->Stock;
    }

    public function getID_Categoria()
    {
        return $this->ID_Categoria;
    }

    public function getID_Proveedor()
    {
        return $this->ID_Proveedor;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }

    public function setStock($Stock)
    {
        $this->Stock = $Stock;
    }

    public function setID_Categoria($ID_Categoria)
    {
        $this->ID_Categoria = $ID_Categoria;
    }

    public function setID_Proveedor($ID_Proveedor)
    {
        $this->ID_Proveedor = $ID_Proveedor;
>>>>>>> 7db6f8bac43c4c7edb0a74aad695c96ea29c0d39
    }
}
