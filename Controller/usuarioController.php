<?php

class UsuarioController {
    private $usuario;

    public function __construct($db) {
        $this->usuario = new Usuario($db);
    }

    // Crear un nuevo usuario
    public function crearUsuario($data) {
        $this->usuario->Nombre = $data['Nombre'];
        $this->usuario->Apellido = $data['Apellido'];
        $this->usuario->Email = $data['Email'];
        $this->usuario->Contrasena = password_hash($data['Contrasena'], PASSWORD_BCRYPT); // Hashear la contraseña
        $this->usuario->Rol = $data['Rol'];

        if($this->usuario->crear()) {
            return json_encode(["message" => "Usuario creado exitosamente."]);
        } else {
            return json_encode(["message" => "Error al crear el usuario."]);
        }
    }

    // Leer todos los usuarios
    public function leerUsuarios() {
        $stmt = $this->usuario->leerTodos();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($usuarios);
    }

    // Leer un usuario por ID
    public function leerUsuarioPorID($id) {
        $this->usuario->ID_Usuario = $id;
        $this->usuario->leerPorID();

        if ($this->usuario->Nombre != null) {
            $usuario_arr = [
                "ID_Usuario" => $this->usuario->ID_Usuario,
                "Nombre" => $this->usuario->Nombre,
                "Apellido" => $this->usuario->Apellido,
                "Email" => $this->usuario->Email,
                "Rol" => $this->usuario->Rol
            ];

            return json_encode($usuario_arr);
        } else {
            return json_encode(["message" => "Usuario no encontrado."]);
        }
    }

    // Actualizar un usuario
    public function actualizarUsuario($data) {
        $this->usuario->ID_Usuario = $data['ID_Usuario'];
        $this->usuario->Nombre = $data['Nombre'];
        $this->usuario->Apellido = $data['Apellido'];
        $this->usuario->Email = $data['Email'];
        $this->usuario->Contrasena = password_hash($data['Contrasena'], PASSWORD_BCRYPT);
        $this->usuario->Rol = $data['Rol'];

        if($this->usuario->actualizar()) {
            return json_encode(["message" => "Usuario actualizado exitosamente."]);
        } else {
            return json_encode(["message" => "Error al actualizar el usuario."]);
        }
    }

    // Eliminar un usuario
    public function eliminarUsuario($id) {
        $this->usuario->ID_Usuario = $id;

        if($this->usuario->eliminar()) {
            return json_encode(["message" => "Usuario eliminado exitosamente."]);
        } else {
            return json_encode(["message" => "Error al eliminar el usuario."]);
        }
    }
}
