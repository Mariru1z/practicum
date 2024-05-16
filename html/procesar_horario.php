<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "horario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los semestres
$sqlSemestres = "SELECT id, nombre FROM semestre";
$resultSemestres = $conn->query($sqlSemestres);

// Consulta SQL para obtener las materias
$sqlMaterias = "SELECT id, nombre FROM materias";
$resultMaterias = $conn->query($sqlMaterias);

// Cerrar conexión
$conn->close();
?>
