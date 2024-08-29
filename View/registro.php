<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Registro</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="register-container">
        <h1>Registro de Usuarios</h1>
        <form action="procesar-registro.php" method="POST">
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

