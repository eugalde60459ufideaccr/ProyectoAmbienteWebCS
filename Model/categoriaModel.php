<?php
require_once('conexionModel.php');

class CategoriaModel
{
    private $conexion;

    public function __construct()
    {
        // Crear una instancia de la clase Conexion
        $conexionObj = new Conexion();
        $this->conexion = $conexionObj->getConn(); // Obtener la conexión PDO
    }

    // Obtener todas las categorías
    public function getAllCategories()
    {
        $query = "SELECT * FROM categorias";
        $stmt = $this->conexion->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una categoría por ID
    public function getCategoryById($id)
    {
        $query = "SELECT * FROM categorias WHERE ID_Categoria = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear una nueva categoría
    public function createCategory($nombre, $descripcion)
    {
        $query = "INSERT INTO categorias (Nombre, Descripcion) VALUES (:nombre, :descripcion)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        return $stmt->execute();
    }

    // Actualizar una categoría existente
    public function updateCategory($id, $nombre, $descripcion)
    {
        $query = "UPDATE categorias SET Nombre = :nombre, Descripcion = :descripcion WHERE ID_Categoria = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar una categoría
    public function deleteCategory($id)
    {
        $query = "DELETE FROM categorias WHERE ID_Categoria = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
