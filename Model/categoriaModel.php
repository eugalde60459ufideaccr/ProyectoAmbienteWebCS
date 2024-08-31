<?php
class CategoriaModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertarCategoria($nombre, $descripcion)
    {
        $query = "INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $descripcion);
        return $stmt->execute();
    }

    public function obtenerCategorias()
    {
        $query = "SELECT * FROM categorias";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCategoria($id)
    {
        $query = "SELECT * FROM categorias WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarCategoria($id, $nombre, $descripcion)
    {
        $query = "UPDATE categorias SET nombre = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $descripcion);
        $stmt->bindParam(3, $id);
        return $stmt->execute();
    }

    public function eliminarCategoria($id)
    {
        $query = "DELETE FROM categorias WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>
