<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "horario");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>