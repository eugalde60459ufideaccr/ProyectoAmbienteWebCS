<?php
include('includes/header.php');
require_once('../Model/conexionModel.php');

// Inicializar la conexión
$conn = (new Conexion())->getConn();

// Verificar si la conexión fue exitosa
if ($conn && isset($_GET['id'])) {
    // Obtener los datos del producto por ID
    $stmt = $conn->prepare("SELECT * FROM producto WHERE ID_Producto = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        die("Producto no encontrado.");
    }
} else {
    die("Error al conectar a la base de datos o ID no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Confirmar Eliminación</title>
    <!-- Incluye tus estilos y scripts aquí -->
</head>

<body>

    <h2>Confirmar Eliminación del Producto</h2>
    <p>¿Estás seguro de que deseas eliminar el siguiente producto?</p>

    <div>
        <strong>Nombre:</strong> <?php echo $producto['Nombre']; ?>
    </div>
    <div>
        <strong>Descripción:</strong> <?php echo $producto['Descripcion']; ?>
    </div>
    <div>
        <strong>Precio:</strong> <?php echo $producto['Precio']; ?>
    </div>
    <div>
        <strong>Stock:</strong> <?php echo $producto['Stock']; ?>
    </div>
    <div>
        <strong>ID Categoría:</strong> <?php echo $producto['ID_Categoria']; ?>
    </div>
    <div>
        <strong>ID Proveedor:</strong> <?php echo $producto['ID_Proveedor']; ?>
    </div>

    <form action="../Controller/productoController.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $producto['ID_Producto']; ?>">
        <input type="hidden" name="accion" value="eliminar">
        <button type="submit">Eliminar</button>
        <a href="editarProducto.php">Editar</a>
        <a href="productosAdmin.php">Cancelar</a>
    </form>

    <?php include('includes/footer.php'); ?>

</body>

</html>