<?php
require_once '../Controller/proveedorController.php';

// Crear una instancia del controlador de proveedores
$proveedorController = new ProveedorController();

// Obtener todos los proveedores usando la instancia del controlador
$proveedores = $proveedorController->obtenerProveedores();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'includes/header.php'; ?>
</head>

<body>
    <!-- Comienzo del contenido principal -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Gestión de Proveedores</h2>

        <!-- Tabla para mostrar los proveedores -->
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($proveedores)): ?>
                    <?php foreach ($proveedores as $proveedor): ?>
                        <tr>
                            <td><?php echo $proveedor['ID_Proveedor']; ?></td>
                            <td><?php echo $proveedor['Nombre']; ?></td>
                            <td><?php echo $proveedor['Contacto']; ?></td>
                            <td>
                                <a href="editarProveedor.php?id=<?php echo $proveedor['ID_Proveedor']; ?>" class="btn btn-warning">Editar</a>
                                <a href="../Controller/proveedorController.php?action=eliminar&id=<?php echo $proveedor['ID_Proveedor']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay proveedores disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="text-center">
            <a href="agregarProveedor.php" class="btn btn-primary">Añadir Nuevo Proveedor</a>
        </div>
    </main>
    <!-- Fin del contenido principal -->

    <?php include 'includes/footer.php'; ?>
</body>

</html>