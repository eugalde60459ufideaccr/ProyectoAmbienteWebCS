<?php
require_once('Model/conexionModel.php');
$db = new Conexion();
$conn = $db->getConn();

if ($conn) {
    echo "¡Conectado exitosamente!";
} else {
    echo "Error en la conexión.";
}
