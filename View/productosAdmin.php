<?php
include('includes/header.php');
require_once('../Model/conexionModel.php');

// Inicializar la conexión
$conn = (new Conexion())->getConn();

// Verificar si la conexión fue exitosa
if ($conn) {
    // Obtener la lista de productos
    $stmt = $conn->query("SELECT * FROM producto");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("Error al conectar a la base de datos.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrar Productos</title>
</head>

<body>

    <div class="container">
        <h2 class="my-4">Gestión de Productos</h2>

        <!-- Botón para añadir nuevo producto -->
        <a href="agregarProducto.php" class="btn btn-primary mb-3">Añadir Nuevo Producto</a>

        <!-- Tabla que muestra los productos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>ID Categoría</th>
                    <th>ID Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['ID_Producto']; ?></td>
                        <td><?php echo $producto['Nombre']; ?></td>
                        <td><?php echo $producto['Descripcion']; ?></td>
                        <td><?php echo $producto['Precio']; ?></td>
                        <td><?php echo $producto['Stock']; ?></td>
                        <td><?php echo $producto['ID_Categoria']; ?></td>
                        <td><?php echo $producto['ID_Proveedor']; ?></td>
                        <td>
                            <!-- Botón para editar producto -->
                            <a href="editarProducto.php?id=<?php echo $producto['ID_Producto']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <!-- Botón para confirmar eliminación -->
                            <a href="confirmarEliminacionProducto.php?id=<?php echo $producto['ID_Producto']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>