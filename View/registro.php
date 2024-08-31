<?php
// Adjust the path to correctly reference the controller
require_once '../Model/conexionModel.php';
require_once '../Controller/autenticacionController.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the database connection
    $database = new Conexion();
    $db = $database->getConn();

    // Create an instance of the Authentication Controller
    $authController = new AutenticacionController($db);

    // Prepare data array for the registration
    $data = [
        'Nombre' => $_POST['nombre'],
        'Apellido' => $_POST['apellido'],
        'Email' => $_POST['email'],
        'Contrasena' => $_POST['contrasena'],
        'Rol' => 'Usuario'  // Default role or change as needed
    ];

    // Call the register method
    $result = $authController->register($data);

    // Check if registration was successful
    $response = json_decode($result, true);
    if (isset($response['message']) && $response['message'] === "Usuario registrado exitosamente.") {
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $response['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Registro</title>
    <!-- Include your CSS and other assets here -->
</head>
<body>
    <div class="register-container">
        <h1>Registro de Usuarios</h1>
        <form action="" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Correo electrónico" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
