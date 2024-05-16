// Dentro de la condición if ($_SERVER["REQUEST_METHOD"] == "POST")
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe
    if(isset($_POST['semestre']) && isset($_POST['materias'])) {
        $semestre_id = $_POST['semestre'];
        $materias_seleccionadas = $_POST['materias'];

        // Array para almacenar las clases asignadas a los profesores
        $horario = [];

        // Iterar sobre las materias seleccionadas
        foreach ($materias_seleccionadas as $materia_id) {
            // Consultar la disponibilidad de los profesores para esta materia en el semestre seleccionado
            $sqlDisponibilidad = "SELECT profesores.id AS profesor_id, profesores.nombre AS nombre_profesor, disponibilidad_profesores.dias_disponibles 
                                   FROM disponibilidad_profesores 
                                   INNER JOIN profesores ON disponibilidad_profesores.profesor_id = profesores.id 
                                   WHERE disponibilidad_profesores.materia_id = $materia_id AND disponibilidad_profesores.semestre_id = $semestre_id";
            $resultDisponibilidad = $conn->query($sqlDisponibilidad);

            // Verificar si se encontraron profesores disponibles para esta materia
            if ($resultDisponibilidad->num_rows > 0) {
                // Asignar la materia a los profesores disponibles
                while ($row = $resultDisponibilidad->fetch_assoc()) {
                    // Verificar la disponibilidad de los días para la materia
                    $dias_disponibles = explode(',', $row['dias_disponibles']);
                    // Aquí debes implementar la lógica para asignar horarios a los profesores
                    // Puedes usar la información de $row para determinar el horario de cada clase
                    // y actualizar el array $horario con la información de la clase asignada
                    // Ejemplo de cómo podrías hacerlo:
                    $horario[$row['nombre_profesor']][] = array('materia' => $materia_id, 'dias_disponibles' => $dias_disponibles);
                }
            } else {
                // Manejar el caso en el que no se encuentren profesores disponibles para la materia
                // Puedes mostrar un mensaje de error o realizar alguna acción adicional según sea necesario
                echo "No hay profesores disponibles para la materia seleccionada.";
            }
        }

        // Generar el horario en forma de tabla utilizando HTML y PHP
        // Aquí debes escribir el código HTML y PHP para generar la tabla con el horario resultante
        // Puedes utilizar la información almacenada en el array $horario para construir la tabla
    }
}
