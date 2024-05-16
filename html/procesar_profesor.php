<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "horario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_profesor = $_POST["nombre_profesor"];
    $materias_impartidas = $_POST["materias_impartidas"];
    $dias_semana = $_POST["dia_semana"];
    $horas_inicio = $_POST["hora_inicio"];
    $horas_fin = $_POST["hora_fin"];

    // Insertar el profesor en la tabla profesores
    $sql_profesor = "INSERT INTO Profesores (nombre_profesor) VALUES ('$nombre_profesor')";
    if ($conn->query($sql_profesor) === TRUE) {
        $id_profesor = $conn->insert_id;

        // Insertar las materias impartidas por el profesor en la tabla Materias_Profesores
        foreach ($materias_impartidas as $materia) {
            $sql_materia_profesor = "INSERT INTO Materias_Profesores (id_profesor, materia) VALUES ($id_profesor, '$materia')";
            if (!$conn->query($sql_materia_profesor)) {
                echo "Error al insertar materia: " . $conn->error;
            }
        }

        // Insertar los horarios disponibles del profesor en la tabla dias_profesor
        for ($i = 0; $i < count($dias_semana); $i++) {
            $dia_semana = $dias_semana[$i];
            $hora_inicio = $horas_inicio[$i];
            $hora_fin = $horas_fin[$i];

            $sql_horario_profesor = "INSERT INTO dias_profesor (id_profesor, dia_semana, hora_inicio, hora_fin) VALUES ($id_profesor, '$dia_semana', '$hora_inicio', '$hora_fin')";
            if (!$conn->query($sql_horario_profesor)) {
                echo "Error al insertar horario: " . $conn->error;
            }
        }

        // Redireccionar a la página de éxito
        header("Location: agregar_profesor.html?success=true");
        exit();
    } else {
        echo "Error al insertar profesor: " . $conn->error;
    }
}
?>
