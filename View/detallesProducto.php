<?php include('includes/header.php'); ?>
<?php
include('../Model/conexionModel.php');
include('../Model/productoModel.php');
include('../Controller/productoController.php');

// Obtener detalles del producto
$id_producto = $_GET['ID_Producto'];
$producto = obtenerProductoPorId($id_producto);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles del Producto</title>
</head>

<body>
    <h1>Detalles del Producto</h1>
    <?php if ($producto): ?>
        <p>Nombre: <?php echo $producto['Nombre']; ?></p>
        <p>Descripción: <?php echo $producto['Descripcion']; ?></p>
        <p>Precio: <?php echo $producto['Precio']; ?></p>
        <p>Stock: <?php echo $producto['Stock']; ?></p>
        <p>ID Categoría: <?php echo $producto['ID_Categoria']; ?></p>
        <p>ID Proveedor: <?php echo $producto['ID_Proveedor']; ?></p>
    <?php else: ?>
        <p>Producto no encontrado.</p>
    <?php endif; ?>
    <a href="editarProducto.php">Editar</a>
    <a href="confirmarEliminacionProducto.php">Eliminar</a>
    <a href="productosAdmin.php">Volver</a>


    <?php include 'includes/footer.php'; ?>
</body>

</html>