<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Catálogo de Productos</h1>
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
        <section class="products">
            <div class="container">
                <h2>Productos en la categoría: <?php echo htmlspecialchars($categoria); ?></h2>
                <div class="product-grid">
                    <?php if (!empty($productos)): ?>
                        <?php foreach ($productos as $producto): ?>
                            <div class="product-item">
                                <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                                <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay productos disponibles en esta categoría.</p>
                    <?php endif; ?>
                </div>
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
