<?php include('includes/header.php'); ?>
<?php
require_once('../Model/conexionModel.php');
require_once('../Model/productoModel.php');
require_once('../Controller/productoController.php');
//include('./detallesProducto.php');
// Obtener la conexión a través de la clase Conexion
$conn = (new Conexion())->getConn();

// Obtener lista de productos
$stmt = $conn->query("SELECT * FROM producto");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener producto específico si se solicita
$producto = null;
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM producto WHERE ID_Producto = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <?php foreach ($productos as $row): ?>
            <tr>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Descripcion']; ?></td>
                <td><?php echo $row['Precio']; ?></td>
                <td><?php echo $row['Stock']; ?></td>
                <td><?php echo $row['ID_Categoria']; ?></td>
                <td><?php echo $row['ID_Proveedor']; ?></td>
                <td>
                    <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>">Ver Detalles</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($producto): ?>
        <h2>Detalles del Producto</h2>
        <p>Nombre: <?php echo $producto['Nombre']; ?></p>
        <p>Descripción: <?php echo $producto['Descripcion']; ?></p>
        <p>Precio: <?php echo $producto['Precio']; ?></p>
        <p>Stock: <?php echo $producto['Stock']; ?></p>
        <p>ID Categoría: <?php echo $producto['ID_Categoria']; ?></p>
        <p>ID Proveedor: <?php echo $producto['ID_Proveedor']; ?></p>
    <?php endif; ?>
</body>

</html>
<?php include('includes/footer.php'); ?>