<?php
require_once '../Model/categoriaModel.php';

class CategoriaController
{
    private $categoriaModel;

    public function __construct($db)
    {
        $this->categoriaModel = new CategoriaModel($db);
    }

    public function crearCategoria($data)
    {
        $nombre = htmlspecialchars(strip_tags($data['nombre']));
        $descripcion = htmlspecialchars(strip_tags($data['descripcion']));
        
        if (empty($nombre)) {
            return json_encode(['error' => 'El nombre de la categoría es requerido.']);
        }
        
        $result = $this->categoriaModel->insertarCategoria($nombre, $descripcion);
        return json_encode(['message' => $result ? 'Categoría creada exitosamente.' : 'Error al crear la categoría.']);
    }

    public function obtenerCategorias()
    {
        return json_encode($this->categoriaModel->obtenerCategorias());
    }

    public function obtenerCategoria($id)
    {
        return json_encode($this->categoriaModel->obtenerCategoria($id));
    }

    public function actualizarCategoria($id, $data)
    {
        $nombre = htmlspecialchars(strip_tags($data['nombre']));
        $descripcion = htmlspecialchars(strip_tags($data['descripcion']));
        
        if (empty($nombre)) {
            return json_encode(['error' => 'El nombre de la categoría es requerido.']);
        }
        
        $result = $this->categoriaModel->actualizarCategoria($id, $nombre, $descripcion);
        return json_encode(['message' => $result ? 'Categoría actualizada exitosamente.' : 'Error al actualizar la categoría.']);
    }

    public function eliminarCategoria($id)
    {
        $result = $this->categoriaModel->eliminarCategoria($id);
        return json_encode(['message' => $result ? 'Categoría eliminada exitosamente.' : 'Error al eliminar la categoría.']);
    }
}
?>
