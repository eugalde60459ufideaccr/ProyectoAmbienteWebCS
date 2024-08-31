<?php include('includes/header.php'); ?>
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
    <!-- Custom CSS for Index Page -->
    <style>
        header {
            background: url('../assets/img/fondo.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 10px 0;
            width: 100%;
            min-height: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo h1 {
            color: white;
            font-size: 24px;
            margin-left: 20px;
            background-color: transparent;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin-right: 20px;
            padding: 0;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            background-color: transparent;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            border: 1px solid white; /* Add border to keep alignment */
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

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
