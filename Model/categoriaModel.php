<?php
require_once('conexionModel.php');

class CategoriaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Conexion())->getConn();
    }

    // Función para obtener todas las categorías
    public function obtenerCategorias()
    {
        try {
            $query = "SELECT * FROM categoria";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener categorías: " . $e->getMessage();
            return false;
        }
    }

    // Función para crear una nueva categoría
    public function crearCategoria($nombre)
    {
        try {
            $query = "INSERT INTO categoria (Nombre) VALUES (:nombre)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear categoría: " . $e->getMessage();
            return false;
        }
    }

    // Función para actualizar una categoría
    public function actualizarCategoria($id, $nombre)
    {
        try {
            $query = "UPDATE categoria SET Nombre = :nombre WHERE ID_Categoria = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar categoría: " . $e->getMessage();
            return false;
        }
    }

    // Función para eliminar una categoría
    public function eliminarCategoria($id)
    {
        try {
            $query = "DELETE FROM categoria WHERE ID_Categoria = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar categoría: " . $e->getMessage();
            return false;
        }
    }
}
