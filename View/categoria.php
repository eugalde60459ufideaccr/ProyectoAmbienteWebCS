<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gestión de Categorías</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="proveedores.php">Proveedores</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="categories">
            <div class="container">
                <h2>Listado de Categorías</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorias as $cat): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cat); ?></td>
                            <td>
                                <a href="?accion=editar&categoria=<?php echo urlencode($cat); ?>">Editar</a> | 
                                <a href="?accion=eliminar&categoria=<?php echo urlencode($cat); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <h2>Agregar Nueva Categoría</h2>
                <form action="?accion=agregar" method="POST">
                    <label for="nueva_categoria">Nombre de la Categoría:</label>
                    <input type="text" id="nueva_categoria" name="nueva_categoria" required>
                    <button type="submit">Agregar Categoría</button>
                </form>

                <h2>Editar Categoría</h2>
                <?php if ($categoria): ?>
                <form action="?accion=editar&categoria=<?php echo urlencode($categoria); ?>" method="POST">
                    <label for="categoria_nueva">Nuevo Nombre de Categoría:</label>
                    <input type="text" id="categoria_nueva" name="categoria_nueva" required>
                    <button type="submit">Actualizar Categoría</button>
                </form>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 FerreExpress. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
