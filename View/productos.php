<?php include('includes/header.php'); ?>
<?php include('../Model/conexionModel.php');
include('../Model/productoModel.php');
include('../Controller/productoController.php');
include('./detallesProducto.php');

// Función para obtener producto por ID
function obtenerProductoPorId($id)
{
    global $conexion;
    $resultado = $conexion->query("SELECT * FROM productos WHERE id = $id");
    return $resultado->fetch_assoc();
}

// Operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crear o actualizar producto
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $id_proveedor = $_POST['id_proveedor'];
    if (isset($_POST['id'])) {
        // Actualizar producto
        $id = $_POST['id'];
        $conexion->query("UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', stock='$stock', id_categoria='$id_categoria', id_proveedor='$id_proveedor' WHERE id=$id");
    } else {
        // Crear nuevo producto
        $conexion->query("INSERT INTO productos (nombre, descripcion, precio, stock, id_categoria, id_proveedor) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$id_categoria', '$id_proveedor')");
    }
} elseif (isset($_GET['delete'])) {
    // Eliminar producto
    $id = $_GET['delete'];
    $conexion->query("DELETE FROM productos WHERE id=$id");
}

// Obtener lista de productos
$productos = $conexion->query("SELECT * FROM productos");

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
    <form method="POST" action="productos.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <input type="number" name="precio" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <input type="number" name="id_categoria" placeholder="ID Categoría" required>
        <input type="number" name="id_proveedor" placeholder="ID Proveedor" required>
        <button type="submit">Guardar</button>
    </form>
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
                    <a href="productos.php?edit=<?php echo $row['id']; ?>">Editar</a>
                    <a href="productos.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
                    <a href="productos.php?id=<?php echo $row['id']; ?>">Detalles</a>
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