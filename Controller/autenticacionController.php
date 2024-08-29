<?php

class AutenticacionController {
    private $conn;
    private $table_name = "usuario";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para iniciar sesión
    public function login($data) {
        $query = "SELECT ID_Usuario, Nombre, Apellido, Email, Contrasena, Rol 
                  FROM " . $this->table_name . " 
                  WHERE Email = :Email LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Email', $data['Email']);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($data['Contrasena'], $row['Contrasena'])) {
            $usuario_arr = [
                "ID_Usuario" => $row['ID_Usuario'],
                "Nombre" => $row['Nombre'],
                "Apellido" => $row['Apellido'],
                "Email" => $row['Email'],
                "Rol" => $row['Rol']
            ];

            return json_encode($usuario_arr);
        } else {
            return json_encode(["message" => "Credenciales incorrectas."]);
        }
    }

    // Método para registrar un nuevo usuario
    public function register($data) {
        $query = "SELECT ID_Usuario FROM " . $this->table_name . " WHERE Email = :Email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Email', $data['Email']);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return json_encode(["message" => "El correo electrónico ya está en uso."]);
        }

        // Inserta el nuevo usuario en la base de datos
        $query = "INSERT INTO " . $this->table_name . " 
                  SET Nombre = :Nombre, 
                      Apellido = :Apellido, 
                      Email = :Email, 
                      Contrasena = :Contrasena, 
                      Rol = :Rol";

        $stmt = $this->conn->prepare($query);

        $data['Nombre'] = htmlspecialchars(strip_tags($data['Nombre']));
        $data['Apellido'] = htmlspecialchars(strip_tags($data['Apellido']));
        $data['Email'] = htmlspecialchars(strip_tags($data['Email']));
        $data['Contrasena'] = htmlspecialchars(strip_tags($data['Contrasena']));
        $data['Rol'] = htmlspecialchars(strip_tags($data['Rol']));

        $hashed_password = password_hash($data['Contrasena'], PASSWORD_BCRYPT);

        $stmt->bindParam(':Nombre', $data['Nombre']);
        $stmt->bindParam(':Apellido', $data['Apellido']);
        $stmt->bindParam(':Email', $data['Email']);
        $stmt->bindParam(':Contrasena', $hashed_password);
        $stmt->bindParam(':Rol', $data['Rol']);

        if($stmt->execute()) {
            return json_encode(["message" => "Usuario registrado exitosamente."]);
        } else {
            return json_encode(["message" => "Error al registrar el usuario."]);
        }
    }
}
