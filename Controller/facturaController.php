<?php
// Requerir el modelo de factura para interactuar con la base de datos
require_once('../Model/facturaModel.php');

class FacturaController {
    private $facturaModel;

    // Constructor para inicializar el modelo de factura
    public function __construct() {
        $this->facturaModel = new FacturaModel();
    }

    // Método para manejar la creación de una nueva factura
    public function crearFactura($fecha, $total, $id_usuario) {
        $nuevoId = $this->facturaModel->crearFactura($fecha, $total, $id_usuario);
        if ($nuevoId) {
            header("Location: ../View/facturas.php"); // Redirigir a la vista de facturas
        } else {
            echo "Error al crear la factura.";
        }
    }

    // Método para obtener todas las facturas
    public function verFacturas() {
        return $this->facturaModel->obtenerFacturas();
    }

    // Método para obtener una factura específica por su ID
    public function verFactura($id_factura) {
        return $this->facturaModel->obtenerFacturaPorId($id_factura);
    }

    // Método para actualizar una factura
    public function actualizarFactura($id_factura, $fecha, $total, $id_usuario) {
        $resultado = $this->facturaModel->actualizarFactura($id_factura, $fecha, $total, $id_usuario);
        if ($resultado) {
            header("Location: ../View/facturas.php"); // Redirigir a la vista de facturas
        } else {
            echo "Error al actualizar la factura.";
        }
    }

    // Método para eliminar una factura
    public function eliminarFactura($id_factura) {
        $resultado = $this->facturaModel->eliminarFactura($id_factura);
        if ($resultado) {
            header("Location: ../View/facturas.php"); // Redirigir a la vista de facturas
        } else {
            echo "Error al eliminar la factura.";
        }
    }
}

// Manejo de acciones basadas en parámetros de URL
if (isset($_GET['action'])) {
    $facturaController = new FacturaController();

    switch ($_GET['action']) {
        case 'crear':
            if (isset($_POST['fecha'], $_POST['total'], $_POST['id_usuario'])) {
                $facturaController->crearFactura($_POST['fecha'], $_POST['total'], $_POST['id_usuario']);
            }
            break;
        case 'actualizar':
            if (isset($_POST['id_factura'], $_POST['fecha'], $_POST['total'], $_POST['id_usuario'])) {
                $facturaController->actualizarFactura($_POST['id_factura'], $_POST['fecha'], $_POST['total'], $_POST['id_usuario']);
            }
            break;
        case 'eliminar':
            if (isset($_GET['id_factura'])) {
                $facturaController->eliminarFactura($_GET['id_factura']);
            }
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}
