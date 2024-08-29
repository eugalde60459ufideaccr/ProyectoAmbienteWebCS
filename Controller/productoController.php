<?php
// Requerir el modelo de producto para interactuar con la base de datos
require_once('../Model/productoModel.php');

class ProductoController {
    private $productoModel;

    // Constructor para inicializar el modelo de producto
    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    // Método para manejar la creación de un nuevo producto
    public function crearProducto($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $ID_Categoria, $ID_Proveedor) {
        $nuevoId = $this->productoModel->crearProducto($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $ID_Categoria, $ID_Proveedor);
        if ($nuevoId) {
            header("Location: ../View/productos.php"); // Redirigir a la vista de productos
        } else {
            echo "Error al crear el producto.";
        }
    }

    // Método para obtener todos los productos
    public function verProductos() {
        return $this->ProductosModel->obtenerProductos();
    }

    // Método para obtener un producto específico por su ID
    public function verProducto($ID_Producto) {
        return $this->ProductosModel->obtenerProductosPorId($ID_Producto);
    }

    // Método para actualizar un producto
    public function actualizarProducto($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $ID_Categoria, $ID_Proveedor) {
        $resultado = $this->ProductoModel->actualizarProducto($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $ID_Categoria, $ID_Proveedor);
        if ($resultado) {
            header("Location: ../View/productos.php"); // Redirigir a la vista de productos
        } else {
            echo "Error al actualizar el producto.";
        }
    }

    // Método para eliminar un producto
    public function eliminarProducto($ID_Producto) {
        $resultado = $this->ProductoModel->eliminarProducto($ID_Producto);
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
                $productoController->crearProducto($_POST['ID_Producto'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Stock'], $_POST['ID_Categoria'], $_POST['ID_Proveedor']);
            }
            break;
        case 'actualizar':
            if (isset($_POST['ID_Producto'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Stock'], $_POST['ID_Categoria'], $_POST['ID_Proveedor'])) {
                $productoController->actualizarProducto($_POST['ID_Producto'], $_POST['Nombre'], $_POST['Descripcion'], $_POST['Stock'], $_POST['ID_Categoria'], $_POST['ID_Proveedor']);
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