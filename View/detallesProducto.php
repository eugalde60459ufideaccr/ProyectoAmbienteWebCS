<?php include('includes/header.php'); ?>
<<<<<<< HEAD
<?php
include('../Model/conexionModel.php');
=======
<?php include('../Model/conexionModel.php');
>>>>>>> 7db6f8bac43c4c7edb0a74aad695c96ea29c0d39
include('../Model/productoModel.php');
include('../Controller/productoController.php');

// Obtener detalles del productoss
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
<<<<<<< HEAD
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
=======
        <p>Nombre: <?php echo $producto['nombre']; ?></p>
        <p>Descripción: <?php echo $producto['descripcion']; ?></p>
        <p>Precio: <?php echo $producto['precio']; ?></p>
        <p>Stock: <?php echo $producto['stock']; ?></p>
        <p>ID Categoría: <?php echo $producto['id_categoria']; ?></p>
        <p>ID Proveedor: <?php echo $producto['id_proveedor']; ?></p>
        <a href="productos.php?edit=<?php echo $producto['id']; ?>">Editar</a>
        <a href="productos.php?delete=<?php echo $producto['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>
    <?php else: ?>
        <p>Producto no encontrado.</p>
    <?php endif; ?>
    <a href="productos.php">Volver</a>
>>>>>>> 7db6f8bac43c4c7edb0a74aad695c96ea29c0d39
</body>

</html>