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
        <form>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
            
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" placeholder="Edad" required>
            
            <label for="provincia">Provincia:</label>
            <input type="text" id="provincia" name="provincia" placeholder="Provincia" required>
            
            <label for="canton">Cantón:</label>
            <input type="text" id="canton" name="canton" placeholder="Cantón" required>
            
            <label for="distrito">Distrito:</label>
            <input type="text" id="distrito" name="distrito" placeholder="Distrito" required>
            
            <label for="tarjeta">Tarjeta:</label>
            <input type="text" id="tarjeta" name="tarjeta" placeholder="Tarjeta" required>
            
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>

