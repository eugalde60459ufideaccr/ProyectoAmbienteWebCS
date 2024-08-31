<?php
require_once('../Model/productoModel.php');

class ProductoController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagenPath)
    {
        $nuevoId = $this->productoModel->crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagenPath);
        if ($nuevoId) {
            header("Location: ../View/productosAdmin.php"); // Redirect to the product admin page
            exit();
        } else {
            echo "Error al crear el producto.";
        }
    }

    public function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagenPath)
    {
        // If no new image is uploaded, keep the existing image path
        if (empty($imagenPath)) {
            $producto = $this->verProducto($id_producto);
            $imagenPath = $producto['Imagen'];
        }

        $resultado = $this->productoModel->actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor, $imagenPath);
        if ($resultado) {
            header("Location: ../View/productosAdmin.php"); // Redirect to the product admin page
            exit();
        } else {
            echo "Error al actualizar el producto.";
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

    public function eliminarProducto($id_producto)
    {
        $resultado = $this->productoModel->eliminarProducto($id_producto);
        if ($resultado) {
            header("Location: ../View/productosAdmin.php"); // Redirect to the product admin page
            exit();
        } else {
            echo "Error al eliminar el producto.";
        }
    }

    public function obtenerCategorias()
    {
        return $this->productoModel->obtenerCategorias();
    }

    public function obtenerProveedores()
    {
        return $this->productoModel->obtenerProveedores();
    }
}

if (isset($_GET['action'])) {
    $productoController = new ProductoController();

    switch ($_GET['action']) {
        case 'crear':
            if (isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor'])) {
                $imagenPath = '';
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                    $imagenPath = 'assets/img/' . basename($_FILES['imagen']['name']);
                    move_uploaded_file($_FILES['imagen']['tmp_name'], '../' . $imagenPath);
                }
                $productoController->crearProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor'], $imagenPath);
            }
            break;
        case 'actualizar':
            if (isset($_POST['id_producto'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor'])) {
                $imagenPath = '';
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                    $imagenPath = 'assets/img/' . basename($_FILES['imagen']['name']);
                    move_uploaded_file($_FILES['imagen']['tmp_name'], '../' . $imagenPath);
                }
                $productoController->actualizarProducto($_POST['id_producto'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_proveedor'], $imagenPath);
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
?>