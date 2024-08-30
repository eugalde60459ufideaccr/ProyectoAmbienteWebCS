<?php include('includes/header.php'); ?>
<?php include('../Model/conexionModel.php');
include('../Model/productoModel.php');
include('../Controller/productoController.php');
include('./detallesProducto.php');

require_once('../Model/conexionModel.php'); // Asegúrate de que la ruta es correcta

// Inicializar la conexión
$conn = (new Conexion())->getConn();

// Verifica si la conexión fue exitosa
if ($conn) {
    // Obtener lista de productos
    $stmt = $conn->query("SELECT * FROM producto");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("Error al conectar a la base de datos.");
}

// Función para obtener producto por ID
function obtenerProductoPorId($id)
{
    global $conn;
    $resultado = $conn->query("SELECT * FROM productos WHERE id = $id");
    return $resultado->fetch(PDO::FETCH_ASSOC);
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
        $conn->query("UPDATE producto SET Nombre='$nombre', Descripcion='$descripcion', Precio='$precio', Stock='$stock', ID_Categoria='$id_categoria', ID_Proveedor='$id_proveedor' WHERE id=$id");
        // Crear nuevo producto
        $conn->query("INSERT INTO productos (Nombre, Descripcion, Precio, Stock, ID_Categoria, ID_Proveedor) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$id_categoria', '$id_proveedor')");
    }
} elseif (isset($_GET['delete'])) {
    // Eliminar producto
    $id = $_GET['delete'];
    $conexion->query("DELETE FROM producto WHERE id=$id");
}

// Obtener lista de productos
$productos = $conn->query("SELECT * FROM producto");

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
    <form method="POST" action="productosAdmin.php">
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
        <?php while ($row = $productos->fetchAll(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Descripcion']; ?></td>
                <td><?php echo $row['Precio']; ?></td>
                <td><?php echo $row['Stock']; ?></td>
                <td><?php echo $row['ID_Categoria']; ?></td>
                <td><?php echo $row['ID_Proveedor']; ?></td>
                <td>
                    <a href="productosAdmin.php?edit=<?php echo $row['id']; ?>">Editar</a>
                    <a href="productosAdmin.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
                    <a href="productosAdmin.php?id=<?php echo $row['id']; ?>">Detalles</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($producto): ?>
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
            <?php while ($row = $productos->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['Precio']; ?></td>
                    <td><?php echo $row['Stock']; ?></td>
                    <td><?php echo $row['ID_Categoria']; ?></td>
                    <td><?php echo $row['ID_Proveedor']; ?></td>
                    <td>
                        <a href="productosAdmin.php?edit=<?php echo $row['id']; ?>">Editar</a>
                        <a href="productosAdmin.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</body>

</html>
<?php include('includes/footer.php'); ?>