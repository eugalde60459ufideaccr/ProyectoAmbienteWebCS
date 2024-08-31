<?php
require_once '../Model/categoriaModel.php';

class CategoriaController
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }

    // Obtener todas las categorías
    public function obtenerCategorias()
    {
        return $this->categoriaModel->getAllCategories();
    }

    // Obtener una categoría por ID
    public function obtenerCategoriaPorId($id)
    {
        return $this->categoriaModel->getCategoryById($id);
    }

    // Crear una nueva categoría
    public function crearCategoria($nombre, $descripcion)
    {
        return $this->categoriaModel->createCategory($nombre, $descripcion);
    }

    // Actualizar una categoría existente
    public function actualizarCategoria($id, $nombre, $descripcion)
    {
        return $this->categoriaModel->updateCategory($id, $nombre, $descripcion);
    }

    // Eliminar una categoría
    public function eliminarCategoria($id)
    {
        return $this->categoriaModel->deleteCategory($id);
    }
}
?>
