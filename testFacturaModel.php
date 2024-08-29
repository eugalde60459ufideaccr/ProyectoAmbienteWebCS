<?php
require_once('Model/facturaModel.php');

$facturaModel = new FacturaModel();

// 1. Crear una nueva factura
$nuevoId = $facturaModel->crearFactura('2024-08-25', 1000.00, 1);
echo "Nueva factura creada con ID: " . $nuevoId . "<br>";

// 2. Obtener todas las facturas
$facturas = $facturaModel->obtenerFacturas();
echo "Facturas:<br>";
print_r($facturas);
echo "<br><br>";

// 3. Obtener una factura específica
$factura = $facturaModel->obtenerFacturaPorId($nuevoId);
echo "Factura con ID $nuevoId:<br>";
print_r($factura);
echo "<br><br>";

// 4. Actualizar la factura
$facturaModel->actualizarFactura($nuevoId, '2024-08-26', 1200.00, 1);
echo "Factura actualizada:<br>";
print_r($facturaModel->obtenerFacturaPorId($nuevoId));
echo "<br><br>";

// 5. Eliminar la factura
$facturaModel->eliminarFactura($nuevoId);
echo "Factura eliminada. Verificación:<br>";
print_r($facturaModel->obtenerFacturaPorId($nuevoId));
