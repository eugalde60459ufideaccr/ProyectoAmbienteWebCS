<?php
require_once('../Model/categoriaModel.php');

class CategoriaController
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }

    // Método para manejar la creación de una nueva categoría
    public function crearCategoria($nombre)
    {
        if ($this->categoriaModel->crearCategoria($nombre)) {
            header("Location: ../View/categoria.php");
        } else {
            echo "Error al crear la categoría.";
        }
    }

    // Método para obtener todas las categorías
    public function verCategorias()
    {
        return $this->categoriaModel->obtenerCategorias();
    }

    // Método para actualizar una categoría
    public function actualizarCategoria($id, $nombre)
    {
        if ($this->categoriaModel->actualizarCategoria($id, $nombre)) {
            header("Location: ../View/categoria.php");
        } else {
            echo "Error al actualizar la categoría.";
        }
    }

    // Método para eliminar una categoría
    public function eliminarCategoria($id)
    {
        if ($this->categoriaModel->eliminarCategoria($id)) {
            header("Location: ../View/categoria.php");
        } else {
            echo "Error al eliminar la categoría.";
        }
    }
}

// Manejo de acciones basadas en parámetros de URL
if (isset($_GET['action'])) {
    $categoriaController = new CategoriaController();

    switch ($_GET['action']) {
        case 'crear':
            if (isset($_POST['nombre'])) {
                $categoriaController->crearCategoria($_POST['nombre']);
            }
            break;
        case 'actualizar':
            if (isset($_POST['id_categoria'], $_POST['nombre'])) {
                $categoriaController->actualizarCategoria($_POST['id_categoria'], $_POST['nombre']);
            }
            break;
        case 'eliminar':
            if (isset($_GET['id'])) {
                $categoriaController->eliminarCategoria($_GET['id']);
            }
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}
