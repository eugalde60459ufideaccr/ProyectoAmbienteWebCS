<?php
require_once('../Model/proveedorModel.php');
require_once('../Model/conexionModel.php');

class ProveedorController {
    private $proveedorModel;

    public function __construct() {
        $conn = new Conexion();
        $dbConnection = $conn->getConn();
        $this->proveedorModel = new ProveedorModel($dbConnection);
    }

    public function crearProveedor($Nombre, $Contacto) {
        $nuevoId = $this->proveedorModel->crearProveedor($Nombre, $Contacto);
        if ($nuevoId) {
            header("Location: ../View/proveedores.php");
        } else {
            echo "Error al crear el proveedor.";
        }
    }

    public function verProveedores() {
        return $this->proveedorModel->obtenerProveedores();
    }

    public function verProveedor($ID_Proveedor) {
        return $this->proveedorModel->obtenerProveedorPorId($ID_Proveedor);
    }

    public function actualizarProveedor($ID_Proveedor, $Nombre, $Contacto) {
        $resultado = $this->proveedorModel->actualizarProveedor($ID_Proveedor, $Nombre, $Contacto);
        if ($resultado) {
            header("Location: ../View/proveedores.php");
        } else {
            echo "Error al actualizar el proveedor.";
        }
    }

    public function eliminarProveedor($ID_Proveedor) {
        $resultado = $this->proveedorModel->eliminarProveedor($ID_Proveedor);
        if ($resultado) {
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
            if (isset($_POST['Nombre'], $_POST['Contacto'])) {
                $proveedorController->crearProveedor($_POST['Nombre'], $_POST['Contacto']);
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
