<?php
// Requerir el modelo de producto para interactuar con la base de datos
require_once('../Model/productoModel.php');

class ProductoController
{
    private $productoModel;

    // Constructor para inicializar el modelo de producto
    public function __construct()
    {
        //Inicialización de variables
        $id_producto = null;
        $nombre = null;
        $descripcion = null;
        $precio = null;
        $stock = null;
        $id_categoria = null;
        $id_proveedor = null;
        $this->productoModel = new ProductoModel($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
    }

    // Método para manejar la creación de un nuevo producto
    public function crearProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        $nuevoId = $this->productoModel->crearProducto($id_producto, $nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor);
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
    public function verProducto($ID_Producto)
    {
        return $this->productoModel->obtenerProductoPorId($ID_Producto);
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
    public function eliminarProducto($id_producto)
    {
        $resultado = $this->productoModel->eliminarProducto($id_producto);
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
