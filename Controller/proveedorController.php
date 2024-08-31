<?php
require_once('../Model/proveedorModel.php');

class ProveedorController
{
    private $proveedorModel;

    public function __construct()
    {
        $this->proveedorModel = new ProveedorModel();
    }

    // Método para manejar la creación de un nuevo proveedor
    public function crearProveedor($nombre, $contacto)
    {
        if ($this->proveedorModel->crearProveedor($nombre, $contacto)) {
            header("Location: ../View/proveedores.php");
        } else {
            echo "Error al crear el proveedor.";
        }
    }

    // Método para obtener todos los proveedores
    public function verProveedores()
    {
        return $this->proveedorModel->obtenerProveedores();
    }

    // Método para actualizar un proveedor
    public function actualizarProveedor($id, $nombre, $contacto)
    {
        if ($this->proveedorModel->actualizarProveedor($id, $nombre, $contacto)) {
            header("Location: ../View/proveedores.php");
        } else {
            echo "Error al actualizar el proveedor.";
        }
    }

    // Método para eliminar un proveedor
    public function eliminarProveedor($id)
    {
        if ($this->proveedorModel->eliminarProveedor($id)) {
            header("Location: ../View/proveedores.php");
        } else {
            echo "Error al eliminar el proveedor.";
        }
    }
}

// Manejo de acciones basadas en parámetros de URL
if (isset($_GET['action'])) {
    $proveedorController = new ProveedorController();

    switch ($_GET['action']) {
        case 'crear':
            if (isset($_POST['nombre'], $_POST['contacto'])) {
                $proveedorController->crearProveedor($_POST['nombre'], $_POST['contacto']);
            }
            break;
        case 'actualizar':
            if (isset($_POST['id_proveedor'], $_POST['nombre'], $_POST['contacto'])) {
                $proveedorController->actualizarProveedor($_POST['id_proveedor'], $_POST['nombre'], $_POST['contacto']);
            }
            break;
        case 'eliminar':
            if (isset($_GET['id'])) {
                $proveedorController->eliminarProveedor($_GET['id']);
            }
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}
