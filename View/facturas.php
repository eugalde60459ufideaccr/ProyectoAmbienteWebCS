<?php
require_once '../Controller/facturaController.php';

// Crear una instancia del controlador de facturas
$facturaController = new FacturaController();

// Obtener todas las facturas usando la instancia del controlador
$facturas = $facturaController->verFacturas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'includes/header.php'; ?>
</head>
<body>
    <!-- Comienzo del contenido principal -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Gestión de Facturas</h2>

        <!-- Tabla para mostrar las facturas -->
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>ID Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($facturas)): ?>
                    <?php foreach($facturas as $factura): ?>
                        <tr>
                            <td><?php echo $factura['ID_Factura']; ?></td>
                            <td><?php echo $factura['Fecha']; ?></td>
                            <td><?php echo $factura['Total']; ?></td>
                            <td><?php echo $factura['ID_Usuario']; ?></td>
                            <td>
                                <a href="editarFactura.php?id=<?php echo $factura['ID_Factura']; ?>" class="btn btn-warning">Editar</a>
                                <a href="../Controller/facturaController.php?action=eliminar&id=<?php echo $factura['ID_Factura']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta factura?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay facturas disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="text-center">
            <a href="agregarFactura.php" class="btn btn-primary">Añadir Nueva Factura</a>
        </div>
    </main>
    <!-- Fin del contenido principal -->

    <?php include 'includes/footer.php'; ?>
</body>
</html>
