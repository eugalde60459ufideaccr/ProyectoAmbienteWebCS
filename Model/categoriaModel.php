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

// Función para obtener productos por categoría
function obtenerProductosPorCategoria($categoria) {
    global $pdo;
    $query = "SELECT * FROM productos WHERE categoria = :categoria";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
