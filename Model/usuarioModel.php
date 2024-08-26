<?php

class Usuario {
    private $conn;
    private $table_name = "usuario"; 

    public $ID_Usuario;
    public $Nombre;
    public $Apellido;
    public $Email;
    public $Contrasena;
    public $Rol;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear un nuevo usuario
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET Nombre = :Nombre, 
                      Apellido = :Apellido, 
                      Email = :Email, 
                      Contrasena = :Contrasena, 
                      Rol = :Rol";

        $stmt = $this->conn->prepare($query);

        // Sanitiza los valores
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->Apellido = htmlspecialchars(strip_tags($this->Apellido));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Contrasena = htmlspecialchars(strip_tags($this->Contrasena));
        $this->Rol = htmlspecialchars(strip_tags($this->Rol));

        // Enlaza los valores
        $stmt->bindParam(':Nombre', $this->Nombre);
        $stmt->bindParam(':Apellido', $this->Apellido);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':Contrasena', $this->Contrasena);
        $stmt->bindParam(':Rol', $this->Rol);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para obtener todos los usuarios
    public function leerTodos() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Método para obtener un usuario por ID
    public function leerPorID() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID_Usuario = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->ID_Usuario);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->Nombre = $row['Nombre'];
            $this->Apellido = $row['Apellido'];
            $this->Email = $row['Email'];
            $this->Contrasena = $row['Contrasena'];
            $this->Rol = $row['Rol'];
        }
    }

    // Método para actualizar un usuario
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET Nombre = :Nombre, 
                      Apellido = :Apellido, 
                      Email = :Email, 
                      Contrasena = :Contrasena, 
                      Rol = :Rol
                  WHERE ID_Usuario = :ID_Usuario";

        $stmt = $this->conn->prepare($query);

        // Sanitiza los valores
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->Apellido = htmlspecialchars(strip_tags($this->Apellido));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Contrasena = htmlspecialchars(strip_tags($this->Contrasena));
        $this->Rol = htmlspecialchars(strip_tags($this->Rol));
        $this->ID_Usuario = htmlspecialchars(strip_tags($this->ID_Usuario));

        // Enlaza los valores
        $stmt->bindParam(':Nombre', $this->Nombre);
        $stmt->bindParam(':Apellido', $this->Apellido);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':Contrasena', $this->Contrasena);
        $stmt->bindParam(':Rol', $this->Rol);
        $stmt->bindParam(':ID_Usuario', $this->ID_Usuario);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para eliminar un usuario
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID_Usuario = :ID_Usuario";

        $stmt = $this->conn->prepare($query);

        $this->ID_Usuario = htmlspecialchars(strip_tags($this->ID_Usuario));

        $stmt->bindParam(':ID_Usuario', $this->ID_Usuario);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
