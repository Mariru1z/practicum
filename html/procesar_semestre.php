<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_semestre = $_POST["nombre_semestre"] ?? '';

    // Realizar la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "horario");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos en la tabla de semestre
    $sql = "INSERT INTO semestres (nombre_semestre) VALUES ('$nombre_semestre')";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conexion->query($sql) === TRUE) {
        header('Location: agregar_semestre.html?success=true');
    } else {
        echo "Error al agregar el semestre: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>
