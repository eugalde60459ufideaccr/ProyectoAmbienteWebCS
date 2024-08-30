<?php include('includes/header.php'); ?>
<?php
include('../Model/conexionModel.php');
include('../Model/productoModel.php');
include('../Controller/productoController.php');
include('./detallesProducto.php');

// Función para obtener producto por ID
function obtenerProductoPorId($id)
{
    global $conexion;
    $resultado = $conexion->query("SELECT * FROM producto WHERE id = $id");
    return $resultado->fetch_assoc();
}

// Obtener lista de productos
$productos = $conexion->query("SELECT * FROM producto");

// Obtener producto específico si se solicita
$producto = null;
if (isset($_GET['id'])) {
    $producto = obtenerProductoPorId($_GET['id']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
</head>

<body>
    <h1>Productos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>ID Categoría</th>
            <th>ID Proveedor</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $productos->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['id_categoria']; ?></td>
                <td><?php echo $row['id_proveedor']; ?></td>
                <td>
                    <a href="productos.php?id=<?php echo $row['id']; ?>">Ver Detalles</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($producto): ?>
        <h2>Detalles del Producto</h2>
        <p>Nombre: <?php echo $producto['nombre']; ?></p>
        <p>Descripción: <?php echo $producto['descripcion']; ?></p>
        <p>Precio: <?php echo $producto['precio']; ?></p>
        <p>Stock: <?php echo $producto['stock']; ?></p>
        <p>ID Categoría: <?php echo $producto['id_categoria']; ?></p>
        <p>ID Proveedor: <?php echo $producto['id_proveedor']; ?></p>
    <?php endif; ?>
</body>

</html>
<?php include('includes/footer.php'); ?>