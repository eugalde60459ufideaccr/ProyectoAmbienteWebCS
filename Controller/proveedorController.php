<?php
// Requerir el modelo de proveedor para interactuar con el base de datos
require_once('../Model/proveedorModel.php');

class ProveedorController
{
    private $proveedorModel;

    // Constructor para inicializar el modelo de proveedor
    public function __construct()
    {
        $this->proveedorModel = new ProveedorModel();
    }

    // Método para manejar la creación de un nuevo proveedor
    public function crearProveedor($ID_Proveedor, $Nombre, $Contacto)
    {
        $nuevoId = $this->proveedorModel->crearProveedor($Nombre, $Contacto);
        if ($nuevoId) {
            header("Location: ../View/proveedores.php"); // Redirigir a la vista de proveedores
        } else {
            echo "Error al crear el proveedor.";
        }
    }

    // Método para obtener todos los proveedores
    public function verProveedores()
    {
        return $this->proveedorModel->obtenerProveedores();
    }

    // Método para obtener una proveedor específico por su ID
    public function verProveedor($ID_Proveedor)
    {
        return $this->proveedorModel->obtenerProveedorPorId($ID_Proveedor);
    }

    // Método para actualizar un proveedor
    public function actualizarProveedor($ID_Proveedor, $Nombre, $Contacto)
    {
        $resultado = $this->proveedorModel->actualizarProveedor($ID_Proveedor, $Nombre, $Contacto);
        if ($resultado) {
            header("Location: ../View/proveedores.php"); // Redirigir a el vista de proveedores
        } else {
            echo "Error al actualizar el proveedor.";
        }
    }

    // Método para eliminar un proveedor
    public function eliminarProveedor($ID_Proveedor)
    {
        $resultado = $this->proveedorModel->eliminarProveedor($ID_Proveedor);
        if ($resultado) {
            header("Location: ../View/froveedors.php"); // Redirigir a el vista de proveedores
        } else {
            echo "Error al eliminar el proveedor.";
        }
    }
}

// Manejo de acciones basadas en parámetros de URL
if (isset($_GET['action'])) {
    $ProveedorController = new ProveedorController();

    switch ($_GET['action']) {
        case 'crear':
            if (isset($_POST['ID_Proveedor'], $_POST['Nombre'], $_POST['Contacto'])) {
                $proveedorController->crearProveedor($_POST['ID_Proveedor'], $_POST['Nombre'], $_POST['Contacto']);
            }
            break;
        case 'actualizar':
            if (isset($_POST['ID_Proveedor'], $_POST['Nombre'], $_POST['Contacto'])) {
                $proveedorController->actualizarProveedor($_POST['ID_Proveedor'], $_POST['Nombre'], $_POST['Contacto']);
            }
            break;
        case 'eliminar':
            if (isset($_GET['ID_Proveedor'])) {
                $proveedorController->eliminarProveedor($_GET['ID_Proveedor']);
            }
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}
