<?php include('includes/header.php'); ?>
<?php include('../Model/conexionModel.php');
include('../Model/proveedorModel.php');
include('../Controller/proveedorController.php');
include('./detallesProveedor.php');

// Función para obtener proveedor por ID
function obtenerProveedorPorId($id)
{
    global $conexion;
    $resultado = $conexion->query("SELECT * FROM proveedores WHERE id = $id");
    return $resultado->fetch_assoc();
}

// Operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crear o actualizar proveedor
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    if (isset($_POST['id'])) {
        // Actualizar proveedor
        $id = $_POST['id'];
        $conexion->query("UPDATE proveedores SET nombre='$nombre', contacto='$contacto' WHERE id=$id");
    } else {
        // Crear nuevo proveedor
        $conexion->query("INSERT INTO proveedores (nombre, contacto) VALUES ('$nombre', '$contacto')");
    }
} elseif (isset($_GET['delete'])) {
    // Eliminar proveedor
    $id = $_GET['delete'];
    $conexion->query("DELETE FROM proveedores WHERE id=$id");
}

// Obtener lista de proveedores
$proveedores = $conexion->query("SELECT * FROM proveedores");

// Obtener proveedor específico si se solicita
$proveedor = null;
if (isset($_GET['id'])) {
    $proveedor = obtenerProveedorPorId($_GET['id']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proveedores</title>
</head>

<body>
    <h1>Proveedores</h1>
    <form method="POST" action="proveedores.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="contacto" placeholder="Contacto" required>
        <button type="submit">Guardar</button>
    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $proveedores->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['contacto']; ?></td>
                <td>
                    <a href="proveedores.php?edit=<?php echo $row['id']; ?>">Editar</a>
                    <a href="proveedores.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
                    <a href="proveedores.php?id=<?php echo $row['id']; ?>">Detalles</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($proveedor): ?>
        <h2>Detalles del Proveedor</h2>
        <p>Nombre: <?php echo $proveedor['nombre']; ?></p>
        <p>Contacto: <?php echo $proveedor['contacto']; ?></p>
    <?php endif; ?>
</body>

</html>
<?php include('includes/footer.php'); ?>