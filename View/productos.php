<?php include('includes/header.php'); ?>
<?php
require_once('../Controller/productoController.php');

// Crear una instancia del controlador de productos
$productoController = new ProductoController();

// Obtener la conexión a través de la clase Conexion
$conn = (new Conexion())->getConn();

// Obtener lista de productos
$stmt = $conn->query("SELECT * FROM producto");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Productos</title>
    <?php include('includes/header.php'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #8B0000;
            /* Mismo color que el logo "FerreExpress" */
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin: 20px auto;
            max-width: 1200px;
        }

        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-item h3 {
            margin: 15px 0;
            font-size: 18px;
            color: #333;
        }

        .product-item p {
            margin: 10px 0;
            font-size: 14px;
            color: #555;
        }

        .product-item .price {
            font-size: 18px;
            font-weight: bold;
            color: #8B0000;
            /* Mismo color que el logo "FerreExpress" */
            margin: 10px 0;
        }

        .product-item .btn {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            background-color: #FF6347;
            /* Botón rojo */
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .product-item .btn:hover {
            background-color: #CD5C5C;
            /* Un tono más oscuro para el hover */
        }
    </style>
</head>

<body>
    <h1>Productos</h1>
    <div class="products-grid">
        <?php foreach ($productos as $row): ?>
            <div class="product-item">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item2">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item3">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item4">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item5">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item6">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item7">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item8">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item9">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item10">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item11">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
        <?php foreach ($productos as $row): ?>
            <div class="product-item12">
                <img src="" alt="Producto" style="width:100%;">
                <h3><?php echo $row['Nombre']; ?></h3>
                <p><?php echo $row['Descripcion']; ?></p>
                <p class="price">₡<?php echo $row['Precio']; ?></p>
                <p>
                    <?php echo "ID Categoría: " . $row['ID_Categoria']; ?><br>
                    <?php echo "ID Proveedor: " . $row['ID_Proveedor']; ?>
                </p>
                <a href="productos.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Ver Detalles</a>
                <a href="facturas.php?id=<?php echo $row['ID_Producto']; ?>" class="btn">Comprar Ahora</a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>