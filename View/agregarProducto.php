<?php
include('includes/header.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Añadir Nuevo Producto</title>
</head>

<body>

    <h2>Añadir Nuevo Producto</h2>

    <form action="../Controller/productoController.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_categoria">ID Categoría:</label>
            <input type="number" name="id_categoria" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_proveedor">ID Proveedor:</label>
            <input type="number" name="id_proveedor" class="form-control" required>
        </div>
        <input type="hidden" name="accion" value="crear">
        <button type="submit" class="btn btn-success">Agregar</button>
    </form>

    <?php include('includes/footer.php'); ?>

</body>

</html>