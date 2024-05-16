<?php
// Establecer conexión a la base de datos
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

?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Horario</title>
    <meta name="description" content="" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="25" viewBox="0 0 25 42" version="1.1">
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Horario</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="index.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Inicio</div>
                        </a>
                    </li>
                    <!-- Layouts -->
                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Formularios &amp; Tablas</span></li>
                    <!-- Forms -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Form Layouts">Formularios</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="agregar_materia.html" class="menu-link">
                                    <div data-i18n="Vertical Form">Agregar materia</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="agregar_semestre.html" class="menu-link">
                                    <div data-i18n="Horizontal Form">Agregar semestre</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="agregar_profesor.html" class="menu-link">
                                    <div data-i18n="Horizontal Form">Agregar profesor</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tables -->
                    <li class="menu-item">
                        <a href="informacion_materias.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">Información materias</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="informacion_profesores.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">Información profesores</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="horario.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">Horario</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="horario_generado.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">Consulta de horario</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <!-- /Search -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                        </ul>
                    </div>
                </nav>

                
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tablas /</span> Información de los profesores</h4>
                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                        <h5 class="card-header">Horario de 
                        <?php 
                        // Mostrar el nombre del periodo seleccionado
                        if (isset($_POST['semestre'])) {
                            $semestreId = $_POST['semestre'];
                            // Consultar la base de datos para obtener el nombre del periodo seleccionado
                            $sqlSemestreNombre = "SELECT nombre_semestre FROM semestres WHERE id = $semestreId";
                            $resultSemestreNombre = $conn->query($sqlSemestreNombre);
                            if ($resultSemestreNombre->num_rows > 0) {
                                $rowSemestreNombre = $resultSemestreNombre->fetch_assoc();
                                echo $rowSemestreNombre['nombre_semestre'];
                            }
                        }
                        ?>
                    </h5>
                            <div class="table-responsive text-nowrap">
                            <table class="table">
                            
                            


                            <?php
// Establecer conexión a la base de datos
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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $semestreId = $_POST['semestre'];
    $materiasSeleccionadas = $_POST['materias'];

    // Limpiar la tabla Horario para insertar nuevos datos
    $conn->query("DELETE FROM Horario WHERE id_semestre = $semestreId");

    // Iterar sobre las materias seleccionadas
    foreach ($materiasSeleccionadas as $materiaId) {
        // Consultar la base de datos para obtener la información de la materia, el número de grupos y los profesores
        $sql = "SELECT m.nombre_materia, m.horas_materia, m.numero_grupos, p.id AS id_profesor, dp.hora_inicio, dp.dia_semana
                FROM Materias m 
                INNER JOIN Materias_Profesores mp ON m.nombre_materia = mp.materia 
                INNER JOIN Profesores p ON mp.id_profesor = p.id 
                INNER JOIN dias_profesor dp ON p.id = dp.id_profesor
                WHERE m.id = $materiaId";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Obtener la información de la materia y el profesor
                $nombreMateria = $row["nombre_materia"];
                $horasMateria = $row["horas_materia"];
                $numeroGrupos = $row["numero_grupos"];
                $idProfesor = $row["id_profesor"];
                $horaInicio = $row["hora_inicio"];
                $diaSemana = $row["dia_semana"];

                // Verificar si hay al menos un profesor asignado a la materia
                if ($numeroGrupos > 0) {
                    // Calcular la hora de finalización de la clase
                    $horaFin = date('H:i', strtotime("$horaInicio + $horasMateria hours"));

                    // Insertar los datos en la tabla Horario para cada grupo
                    for ($i = 0; $i < $numeroGrupos; $i++) {
                        // Insertar los datos en la tabla Horario
                        $insertQuery = "INSERT INTO Horario (id_semestre, id_materia, id_profesor, dia_semana, hora_inicio, hora_fin)
                                        VALUES ($semestreId, $materiaId, $idProfesor, '$diaSemana', '$horaInicio', '$horaFin')";
                        if ($conn->query($insertQuery) !== TRUE) {
                            echo "Error al insertar datos: " . $conn->error;
                        }
                    }
                } else {
                    echo "La materia '$nombreMateria' no tiene profesores asignados.";
                }
            }
        } else {
            echo "No se encontró información de la materia.";
        }
    }
}
?>

<?php
// Establecer conexión a la base de datos
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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $semestreId = $_POST['semestre'];

    // Consultar la base de datos para obtener los datos de la tabla Horario
    $sql = "SELECT m.nombre_materia, p.nombre_profesor, h.dia_semana, h.hora_inicio, h.hora_fin
            FROM Horario h
            INNER JOIN Materias m ON h.id_materia = m.id
            INNER JOIN Profesores p ON h.id_profesor = p.id
            WHERE h.id_semestre = $semestreId";
    $result = $conn->query($sql);

    // Imprimir la tabla HTML
    if ($result && $result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Materia</th>
                    <th>Profesor</th>
                    <th>Día</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre_materia'] . "</td>";
            echo "<td>" . $row['nombre_profesor'] . "</td>";
            echo "<td>" . $row['dia_semana'] . "</td>";
            echo "<td>" . $row['hora_inicio'] . "</td>";
            echo "<td>" . $row['hora_fin'] . "</td>";
            
            
            echo "</tr>";
            
        }
        echo "</table>";
    } else {
        echo "No se encontraron datos en la tabla Horario para el semestre seleccionado.";
    }
}
?>








                    <!--materia_tabla--->
                    <style type="text/css">
    body {
      font-family: "Times New Roman";
      font-size: 12pt;
      background-color: #f0f0f0; /* Background color */
    }
    table {
      margin: 0 auto; /* Center the table */
      border-collapse: collapse;
      width: 600px; /* Adjust width as needed */
    }
    td {
      padding: 10px;
    }
    p {
      margin: 0;
    }
    .header {
      background-color: #cce5ff; /* Pastel blue */
    }
    .odd-row {
      background-color: #ffd9b3; /* Pastel orange */
    }
    .even-row {
      background-color: #d9ead3; /* Pastel green */
    }
  </style>
                   
    <style type="text/css">
      body {
        font-family: "Times New Roman";
        font-size: 12pt;
      }
      p {
        margin: 0pt;
      }
      table {
        margin-top: 0pt;
        margin-bottom: 0pt;
      }
    </style>
    
  
    <div>
    
      
      

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.8/xlsx.full.min.js"></script>

    <script>
        function exportToPDF() {
            const doc = new jsPDF();
            doc.autoTable({ html: '#table' }); // Utiliza el id de la tabla aquí
            doc.save('tabla.pdf');
        }

        function exportToExcel() {
            const wb = XLSX.utils.table_to_book(document.querySelector('#table'), { sheet: "Sheet JS" }); // Utiliza el id de la tabla aquí
            XLSX.writeFile(wb, 'tabla.xlsx');
        }
    </script>
      <p
        style="
          margin-right: 507.55pt;
          margin-left: 46.6pt;
          text-indent: 12.3pt;
          line-height: 8pt;
        "
      >
        <span
          style="font-family: Calibri; font-size: 8pt; letter-spacing: 2.25pt"
        >
        </span
        ><span style="font-family: Calibri; font-size: 8pt; -aw-import: spaces"
          > </span
        ><span
          style="font-family: Calibri; font-size: 8pt; letter-spacing: 4.45pt"
        >
        </span
        ><span
          style="font-family: Calibri; font-size: 8pt; letter-spacing: 2.85pt"
        >
        </span
        >
      </p>
      <p
        style="
          margin-top: 19.4pt;
          margin-left: 12.95pt;
          text-align: justify;
          line-height: 9.75pt;
        "
      >
        <span
          style="font-family: Calibri; font-size: 8pt; letter-spacing: 6.05pt"
        >
        </span
        ><span
          style="font-family: Calibri; font-size: 8pt; letter-spacing: 15.55pt"
        >
        </span
        ><span
          style="font-family: Calibri; font-size: 8pt; letter-spacing: 218.4pt"
        >
        </span
        ><span
          style="font-family: Calibri; font-size: 8pt; letter-spacing: 16.1pt"
        >
        </span
        >
      </p>
     
</div>

    </div>
    
    <div>
   
   

  </body>
</html>

                    <!--END TABLA HORARIO-->
