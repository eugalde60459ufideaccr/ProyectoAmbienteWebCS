<?php
require_once '../Controller/categoriaController.php';

$categoriaController = new CategoriaController();

// Verificar si se ha realizado alguna acción
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crear'])) {
        // Crear una nueva categoría
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoriaController->crearCategoria($nombre, $descripcion);
    } elseif (isset($_POST['actualizar'])) {
        // Actualizar una categoría existente
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoriaController->actualizarCategoria($id, $nombre, $descripcion);
    }
} elseif (isset($_GET['eliminar'])) {
    // Eliminar una categoría
    $id = $_GET['eliminar'];
    $categoriaController->eliminarCategoria($id);
}

// Obtener todas las categorías
$categorias = $categoriaController->obtenerCategorias();

// Si se está editando una categoría, obtener sus datos
$categoria = null;
if (isset($_GET['editar'])) {
    $categoria = $categoriaController->obtenerCategoriaPorId($_GET['editar']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>
    <link rel="stylesheet" href="styles.css"> <!-- Incluye tu CSS aquí -->
</head>
<body>
    <h1>Gestión de Categorías</h1>
    
    <!-- Formulario para crear o actualizar una categoría -->
    <form method="POST" action="categoria.php">
        <input type="hidden" name="id" value="<?php echo isset($categoria['ID_Categoria']) ? $categoria['ID_Categoria'] : ''; ?>">
        <input type="text" name="nombre" placeholder="Nombre" required value="<?php echo isset($categoria['Nombre']) ? $categoria['Nombre'] : ''; ?>">
        <textarea name="descripcion" placeholder="Descripción" required><?php echo isset($categoria['Descripcion']) ? $categoria['Descripcion'] : ''; ?></textarea>
        <?php if (isset($categoria['ID_Categoria'])): ?>
            <button type="submit" name="actualizar">Actualizar Categoría</button>
        <?php else: ?>
            <button type="submit" name="crear">Crear Categoría</button>
        <?php endif; ?>
    </form>
    
    <!-- Tabla para mostrar las categorías -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categorias)): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?php echo $categoria['ID_Categoria']; ?></td>
                        <td><?php echo $categoria['Nombre']; ?></td>
                        <td><?php echo $categoria['Descripcion']; ?></td>
                        <td>
                            <a href="categoria.php?editar=<?php echo $categoria['ID_Categoria']; ?>">Editar</a>
                            <a href="categoria.php?eliminar=<?php echo $categoria['ID_Categoria']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay categorías disponibles</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
