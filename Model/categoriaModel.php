<?php
// Establecer la conexión a la base de datos
$host = 'localhost';
$dbname = 'ferreexpress';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Función para obtener todas las categorías
function obtenerCategorias() {
    global $pdo;
    $query = "SELECT DISTINCT categoria FROM productos";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Función para agregar una nueva categoría
function agregarCategoria($nueva_categoria) {
    global $pdo;
    $query = "INSERT INTO productos (categoria) VALUES (:categoria)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':categoria', $nueva_categoria, PDO::PARAM_STR);
    $stmt->execute();
}

// Función para editar una categoría existente
function editarCategoria($categoria_antigua, $categoria_nueva) {
    global $pdo;
    $query = "UPDATE productos SET categoria = :categoria_nueva WHERE categoria = :categoria_antigua";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':categoria_nueva', $categoria_nueva, PDO::PARAM_STR);
    $stmt->bindParam(':categoria_antigua', $categoria_antigua, PDO::PARAM_STR);
    $stmt->execute();
}

// Función para eliminar una categoría
function eliminarCategoria($categoria) {
    global $pdo;
    $query = "DELETE FROM productos WHERE categoria = :categoria";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $stmt->execute();
}
?>
