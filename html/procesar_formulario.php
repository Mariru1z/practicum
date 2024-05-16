<?php
// Include the file with the database connection
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_materia = $_POST["nombre_materia"];
    $prerrequisito = $_POST["prerrequisito"];
    $horas_materia = $_POST["horas_materia"];
    $numero_grupos = $_POST["numero_grupos"]; // Agregar esta línea para obtener el valor de numero_grupos

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO materias (nombre_materia, prerrequisito, horas_materia, numero_grupos) 
            VALUES ('$nombre_materia', '$prerrequisito', '$horas_materia', '$numero_grupos')"; // Incluir el valor de numero_grupos en la consulta SQL

    if ($conexion->query($sql) === TRUE) {
        // Redireccionar a la página agregar_materia.html con el parámetro 'success=true'
        header('Location: agregar_materia.html?success=true');
        exit; // Asegúrate de salir del script después de redirigir
    } else {
        echo "Error al agregar la materia: " . $conexion->error;
    }
}
?>
