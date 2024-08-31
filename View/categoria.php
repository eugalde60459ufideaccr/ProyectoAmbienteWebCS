<?php
require_once '../Controller/categoriaController.php';
require_once '../Model/conexionModel.php';

$database = new Conexion();
$db = $database->getConn();
$controller = new CategoriaController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;
    $response = $id ? $controller->actualizarCategoria($id, $_POST) : $controller->crearCategoria($_POST);
    echo $response;
    exit();
} elseif (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $response = $controller->eliminarCategoria($id);
    echo $response;
    exit();
}

$categorias = json_decode($controller->obtenerCategorias(), true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="styles.css"> <!-- CSS externo -->
</head>
<body>
    <h1>Categorías</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? intval($_GET['edit']) : ''; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Descripción">
        <button type="submit">Guardar</button>
    </form>

    <h2>Lista de Categorías</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?php echo htmlspecialchars($categoria['nombre']); ?></td>
                <td><?php echo htmlspecialchars($categoria['descripcion']); ?></td>
                <td>
                    <a href="?edit=<?php echo intval($categoria['id']); ?>">Editar</a>
                    <a href="?delete=<?php echo intval($categoria['id']); ?>" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
