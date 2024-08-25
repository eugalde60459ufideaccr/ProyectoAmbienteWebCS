<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - FerreExpress</title>
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
        <section id="cart" class="cart">
            <div class="container">
                <h2>Carrito de Compras</h2>
                <p>Aquí puedes revisar los productos que has agregado a tu carrito.</p>
                <!-- Ejemplos, solo para demostrar el uso del front-end por el momento. -->
                <div class="cart-items">
                    <div class="cart-item">
                        <img src="img/taladro-carrito.webp" alt="Herramienta" style="width: 500px; height: auto;">
                        <h3>Taladro</h3>
                        <p>Precio: ₡20,000</p>
                    </div>
                    <div class="cart-item">
                        <img src="img/cemento-carrito.webp" alt="Material de Construcción" style="width: 500px; height: auto;">
                        <h3>Cemento</h3>
                        <p>Precio: ₡5,000</p>
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