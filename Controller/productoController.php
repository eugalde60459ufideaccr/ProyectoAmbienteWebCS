<?php
// Requerir el modelo de producto para interactuar con la base de datos
require_once('../Model/productoModel.php');

class ProductoController
{
    private $productoModel;

    // Constructor para inicializar el modelo de factura
    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }


    // Método para manejar la creación de un nuevo producto
    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $nuevoId = $this->productoModel->crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
        if ($nuevoId) {
            header("Location: ../View/productos.php"); // Redirigir a la vista de productos
        } else {
            echo "Error al crear el producto.";
        }
    }

    // Método para obtener todos los productos
    public function verProductos()
    {
        return $this->productoModel->obtenerProductos();
    }

    // Método para obtener un producto específico por su ID
    public function verProducto($id_producto)
    {
        return $this->productoModel->obtenerProductoPorId($id_producto);
    }

    // Método para actualizar un producto
    public function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $resultado = $this->productoModel->actualizarProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
        if ($resultado) {
            header("Location: ../View/productos.php"); // Redirigir a la vista de productos
        } else {
            echo "Error al actualizar el producto.";
        }
    }

    // Método para eliminar un producto
    public function eliminarProducto($ID_Producto)
    {
        $resultado = $this->productoModel->eliminarProducto($ID_Producto);
        if ($resultado) {
            header("Location: ../View/productos.php"); // Redirigir a la vista de productos
        } else {
            echo "Error al eliminar el producto.";
        }
    }
}

// Manejo de acciones basadas en parámetros de URL
if (isset($_GET['action'])) {
    $productoController = new ProductoController();

    switch ($_GET['action']) {
        case 'crear':
            if (isset($_POST['ID_Producto'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Stock'], $_POST['ID_Categoria'], $_POST['ID_Proveedor'])) {
                $productoController->crearProducto($_POST['ID_Producto'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Precio'], $_POST['Stock'], $_POST['ID_Categoria'], $_POST['ID_Proveedor']);
            }
            break;
        case 'actualizar':
            if (isset($_POST['ID_Producto'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Stock'], $_POST['ID_Categoria'], $_POST['ID_Proveedor'])) {
                $productoController->actualizarProducto($_POST['ID_Producto'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Precio'], $_POST['Stock'], $_POST['ID_Categoria'], $_POST['ID_Proveedor']);
            }
            break;
        case 'eliminar':
            if (isset($_GET['ID_Producto'])) {
                $productoController->eliminarProducto($_GET['ID_Producto']);
            }
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}
