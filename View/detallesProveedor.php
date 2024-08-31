<?php include('includes/header.php'); ?>
<?php include('../Model/conexionModel.php');
include('../Model/proveedorModel.php');
include('../Controller/proveedorController.php');

// Obtener detalles del proveedor
$id = $_GET['id'];
$proveedor = obtenerProveedorPorId($id);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles del Proveedor</title>
</head>

<body>
    <h1>Detalles del Proveedor</h1>
    <?php if ($proveedor): ?>
        <p>Nombre: <?php echo $proveedor['nombre']; ?></p>
        <p>Contacto: <?php echo $proveedor['contacto']; ?></p>
        <a href="proveedores.php?edit=<?php echo $proveedor['id']; ?>">Editar</a>
        <a href="proveedores.php?delete=<?php echo $proveedor['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</a>
    <?php else: ?>
        <p>Proveedor no encontrado.</p>
    <?php endif; ?>
    <a href="proveedores.php">Volver</a>
</body>

</html>