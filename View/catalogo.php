<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Categorías - Ferre Express</title>
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
        <section id="catalogo" class="products">
            <div class="container">
                <h2 id="categoria-title">Categoría</h2>
                <div id="product-grid" class="product-grid">
                    <!-- Aquí se cargarán los productos de la categoría -->
                </div>
            </div>
        </section>

        <section id="productos" class="products">
            <div class="container">
                <h2>Nuestros Productos</h2>
                <div class="product-grid">
                    <div class="product-item">
                        <img src="img/herramientas.png" alt="Herramientas">
                        <h3><a href="CatalogodeCategorias.html?categoria=Herramientas">Herramientas</a></h3>
                        <p>Amplia gama de herramientas para todas sus necesidades.</p>
                    </div>
                    <div class="product-item">
                        <img src="img/construccion.png" alt="Materiales de Construcción">
                        <h3><a href="CatalogodeCategorias.html?categoria=Construcción">Construcción</a></h3>
                        <p>Materiales de alta calidad para sus proyectos de construcción.</p>
                    </div>
                    <div class="product-item">
                        <img src="img/acabados.webp" alt="Acabados">
                        <h3><a href="CatalogodeCategorias.html?categoria=Acabados">Acabados</a></h3>
                        <p>Acabados decorativos y funcionales para su hogar.</p>
                    </div>
                    <div class="product-item">
                        <img src="img/hogar.png" alt="Productos para el Hogar">
                        <h3><a href="CatalogodeCategorias.html?categoria=Hogar">Hogar</a></h3>
                        <p>Todo lo que necesita para el mantenimiento de su hogar.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="nosotros" class="about">
            <div class="container">
                <h2>Sobre Nosotros</h2>
                <p>FerreExpress es una ferretería dedicada a ofrecer productos de alta calidad y un excelente servicio
                    al cliente. Ubicados en Buenos Aires de Puntarenas, Costa Rica, hemos sido el pilar de la comunidad
                    local por más de 20 años.</p>
            </div>
        </section>

        <section id="contacto" class="contact">
            <div class="container">
                <h2>Contacto</h2>
                <form action="#">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Mensaje:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit" class="btn">Enviar</button>
                </form>
            </div>
        </section>

        <section id="login" class="login">
            <div class="container">
                <h2>Iniciar Sesión</h2>
                <form action="#">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit" class="btn">Entrar</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 FerreExpress. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="CatalogodeCategorias.js"></script>

</body>

</html>
<?php include('includes/footer.php'); ?>