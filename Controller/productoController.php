<?php
require_once('../Model/productoModel.php');

class ProductoController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $nuevoId = $this->productoModel->crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
        if ($nuevoId) {
            header("Location: ../View/productosAdmin.php"); // Redirigir a la vista de productos
            exit();
        } else {
            echo "Error al crear el producto.";
        }
    }

    public function verProductos()
    {
        return $this->productoModel->obtenerProductos();
    }

    public function verProducto($id_producto)
    {
        return $this->productoModel->obtenerProductoPorId($id_producto);
    }

    public function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $resultado = $this->productoModel->actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
        if ($resultado) {
            header("Location: ../View/productosAdmin.php"); // Redirigir a la vista de productos
            exit();
        } else {
            echo "Error al actualizar el producto.";
        }
    }

    public function eliminarProducto($id_producto)
    {
        $resultado = $this->productoModel->eliminarProducto($id_producto);
        if ($resultado) {
            header("Location: ../View/productosAdmin.php"); // Redirigir a la vista de productos
            exit();
        } else {
            echo "Error al eliminar el producto.";
        }
    }
}

if (isset($_GET['action'])) {
    $productoController = new ProductoController();

    switch ($_GET['action']) {
        case 'crear':
            if (isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor'])) {
                $productoController->crearProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor']);
            }
            break;
        case 'actualizar':
            if (isset($_POST['id_producto'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor'])) {
                $productoController->actualizarProducto($_POST['id_producto'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor']);
            }
            break;
        case 'eliminar':
            if (isset($_GET['id_producto'])) {
                $productoController->eliminarProducto($_GET['id_producto']);
            }
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}
