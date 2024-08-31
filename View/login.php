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

    // Prepare data array for the login
    $data = [
        'Email' => $_POST['email'],
        'Contrasena' => $_POST['contrasena']
    ];

    // Call the login method
    $result = $authController->login($data);

    // Check if login was successful
    $response = json_decode($result, true);
    if (isset($response['ID_Usuario'])) {
        // Start a session and store user data
        session_start();
        $_SESSION['ID_Usuario'] = $response['ID_Usuario'];
        $_SESSION['Nombre'] = $response['Nombre'];
        $_SESSION['Apellido'] = $response['Apellido'];
        $_SESSION['Email'] = $response['Email'];
        $_SESSION['Rol'] = $response['Rol'];

        // Redirect to the index page after successful login
        header("Location: index.php");
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
    <title>Inicio de Sesión</title>
    <!-- Include your CSS and other assets here -->
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form method="POST" action="">
        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
