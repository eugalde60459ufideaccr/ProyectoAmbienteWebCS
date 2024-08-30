<?php /*include('includes/header.php'); ?>
<?php
include('../Model/conexionModel.php');
include('../Model/productoModel.php');
include('../Controller/productoController.php');

// Obtener detalles del producto
$id = $_GET['id'];
$producto = obtenerProductoPorId($id);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles del Producto</title>
</head>

<body>
    <h1>Detalles del Producto</h1>
    <?php if ($producto): ?>
        <p>Nombre: <?php echo $producto['nombre']; ?></p>
        <p>Descripción: <?php echo $producto['descripcion']; ?></p>
        <p>Precio: <?php echo $producto['precio']; ?></p>
        <p>Stock: <?php echo $producto['stock']; ?></p>
        <p>ID Categoría: <?php echo $producto['id_categoria']; ?></p>
        <p>ID Proveedor: <?php echo $producto['id_proveedor']; ?></p>
    <?php else: ?>
        <p>Producto no encontrado.</p>
    <?php endif; ?>
    <a href="productos.php">Volver</a>

    <?php include 'includes/footer.php'; ?>
</body>

</html> */