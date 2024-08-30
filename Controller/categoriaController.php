<?php
include('categoriaModel.php');

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$nueva_categoria = isset($_POST['nueva_categoria']) ? $_POST['nueva_categoria'] : '';

// Manejo de acciones
if ($accion === 'eliminar') {
    eliminarCategoria($categoria);
} elseif ($accion === 'agregar') {
    agregarCategoria($nueva_categoria);
} elseif ($accion === 'editar') {
    $categoria_nueva = isset($_POST['categoria_nueva']) ? $_POST['categoria_nueva'] : '';
    editarCategoria($categoria, $categoria_nueva);
}

// Obtener todas las categorías
$categorias = obtenerCategorias();

include('categoriaView.php');
?>
