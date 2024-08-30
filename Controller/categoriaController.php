<?php
include('categoriaModel.php');

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Validar la categoría
$categoriasValidas = ['Acabados', 'Construcción', 'Hogar', 'Herramientas'];
if (!in_array($categoria, $categoriasValidas)) {
    die("Categoría no válida");
}

// Obtener productos de la categoría
$productos = obtenerProductosPorCategoria($categoria);

// Incluir la vista
include('categoriaView.php');
?>
