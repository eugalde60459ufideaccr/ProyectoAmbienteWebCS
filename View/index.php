<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FerreExpress</title>

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="../assets/css/styles.css" rel="stylesheet">

    <!-- Custom Inline Styles for Index Page -->
    <style>
        header {
            background: url('../assets/img/fondo.jpg') no-repeat center center;
            background-size: cover;
            padding: 10px 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar {
            background-color: transparent !important;
        }

        .navbar-brand {
            color: transparent !important;
            font-size: 1.75rem;
            font-weight: bold;
        }

        .h2 {
            color:aliceblue
        }

        .navbar-nav .nav-link {
            color: white !important;
            background-color: transparent !important;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
        }

        .navbar-toggler {
            border-color: white;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>

<body>
    <!-- Navigation Bar Start -->
    <header>
        <nav class="navbar navbar-expand-lg shadow sticky-top p-0">
            <a href="../View/index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <h2 class="m-0">FerreExpress</h2>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="../View/index.php" class="nav-item nav-link">Inicio</a>
                    <a href="../View/productos.php" class="nav-item nav-link">Productos</a>
                    <a href="../View/facturas.php" class="nav-item nav-link">Facturas</a>
                    <a href="../View/ordenes.php" class="nav-item nav-link">Órdenes</a>
                    <a href="../View/proveedores.php" class="nav-item nav-link">Proveedores</a>
                    <a href="../View/usuarios.php" class="nav-item nav-link">Usuarios</a>
                    <a href="../View/contacto.php" class="nav-item nav-link">Contacto</a>
                </div>
            </div>
        </nav>
    </header>

<body>
    <!-- Hero Section Start -->
    <section class="hero">
        <div class="container">
            <h2 class="text-center">Bienvenidos a FerreExpress</h2>
            <p class="text-center">Su ferretería de confianza en Buenos Aires de Puntarenas, Costa Rica.</p>
            <div class="text-center">
                <a href="#productos" class="btn btn-primary">Ver Productos</a>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="../assets/img/fondo.jpg" style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">20 <span class="fs-4">Años</span></h1>
                            <h4 class="text-white">De experiencia</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase">// Sobre nosotros //</h6>
                    <h1 class="mb-4"><span class="text-primary">FerreExpress</span> - Su Ferretería de Confianza</h1>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Amplia Variedad de Productos</h6>
                                    <span>Encuentra herramientas, materiales de construcción, acabados, y más.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Servicio al Cliente</h6>
                                    <span>Atención personalizada para ayudarte a encontrar lo que necesitas.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Productos de Calidad</h6>
                                    <span>Garantizamos la calidad de todos nuestros productos.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Products Section Start -->
    <section id="productos" class="products">
        <div class="container">
            <h2 class="text-center">Nuestros Productos</h2>
            <div class="product-grid">
                <div class="product-item">
                    <img src="../assets/img/herramientas.png" alt="Herramientas">
                    <h3><a href="CatalogodeCategorias.html?categoria=Herramientas">Herramientas</a></h3>
                    <p>Amplia gama de herramientas para todas sus necesidades.</p>
                </div>
                <div class="product-item">
                    <img src="../assets/img/construccion.png" alt="Materiales de Construcción">
                    <h3><a href="CatalogodeCategorias.html?categoria=Construcción">Construcción</a></h3>
                    <p>Materiales de alta calidad para sus proyectos de construcción.</p>
                </div>
                <div class="product-item">
                    <img src="../assets/img/acabados.webp" alt="Acabados">
                    <h3><a href="CatalogodeCategorias.html?categoria=Acabados">Acabados</a></h3>
                    <p>Acabados decorativos y funcionales para su hogar.</p>
                </div>
                <div class="product-item">
                    <img src="../assets/img/hogar.png" alt="Productos para el Hogar">
                    <h3><a href="CatalogodeCategorias.html?categoria=Hogar">Hogar</a></h3>
                    <p>Todo lo que necesita para el mantenimiento de su hogar.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Products Section End -->

    <!-- Contact Section Start -->
    <section id="contacto" class="contact">
        <div class="container">
            <h2 class="text-center">Contacto</h2>
            <form action="#">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section -->
    <?php include('includes/footer.php'); ?>
</body>

</html>
