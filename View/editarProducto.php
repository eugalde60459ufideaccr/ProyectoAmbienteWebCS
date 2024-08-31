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
    <title>Editar Producto</title>
    <!-- Incluye tus estilos y scripts aquí -->
</head>

<body>

    <h2>Editar Producto</h2>
    <form action="../Controller/productoController.php" method="POST">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $producto['Nombre']; ?>" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo $producto['Descripcion']; ?></textarea>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?php echo $producto['Precio']; ?>" step="0.01" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo $producto['Stock']; ?>" required>
        </div>
        <div>
            <label for="id_categoria">ID Categoría:</label>
            <input type="number" id="id_categoria" name="id_categoria" value="<?php echo $producto['ID_Categoria']; ?>" required>
        </div>
        <div>
            <label for="id_proveedor">ID Proveedor:</label>
            <input type="number" id="id_proveedor" name="id_proveedor" value="<?php echo $producto['ID_Proveedor']; ?>" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $producto['ID_Producto']; ?>">
        <input type="hidden" name="accion" value="editar">
        <button type="submit">Guardar Cambios</button>
    </form>

    <?php include('includes/footer.php'); ?>

</body>

</html>