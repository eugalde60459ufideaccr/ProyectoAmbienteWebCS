<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores - FerreExpress</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1><a href="index.html" class="logo-link">FerreExpress</a></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="#productos">Productos</a></li>
                    <li class="dropdown">
                        <a href="#catalogo">Catálogo</a>
                        <ul class="dropdown-content">
                            <li><a href="CatalogodeCategorias.html?categoria=Acabados">Acabados</a></li>
                            <li><a href="CatalogodeCategorias.html?categoria=Construcción">Construcción</a></li>
                            <li><a href="CatalogodeCategorias.html?categoria=Hogar">Hogar</a></li>
                            <li><a href="CatalogodeCategorias.html?categoria=Herramientas">Herramientas</a></li>
                        </ul>
                    </li>
                    <li><a href="Carrito.html">Carrito</a></li>
                    <li><a href="Proveedores.html">Proveedores</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="#login">Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="providers" class="providers">
            <div class="container">
                <h2>Nuestros Proveedores</h2>
                <p>Trabajamos con una variedad de proveedores para ofrecer los mejores productos.</p>
                <!-- Solo ejemplos por ahora -->
                <div class="provider-list">
                    <div class="provider-item">
                        <h3>Grupo Husqvarna</h3>
                        <img src="img/Proveedor 1 - Husqvarna.jfif" alt="Proveedor" style="width: 500px; height: auto;">
                        <p>Especializados en herramientas de alta calidad.</p>
                    </div>
                    <div class="provider-item">
                        <h3>Qubradores del Sur S.A.</h3>
                        <img src="img/Proveedor 2 - Quebradores del Sur.jfif" alt="Proveedor" style="width: 500px; height: auto;">
                        <p>Ofrecen materiales de construcción de primera clase.</p>
                    </div>
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
<?php include('includes/footer.php'); ?>