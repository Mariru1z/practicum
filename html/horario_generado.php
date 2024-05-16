<?php
// Realizar la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "horario");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se ha enviado la solicitud de eliminar un profesor
if (isset($_GET['eliminar_profesor'])) {
    $id_profesor_eliminar = $_GET['eliminar_profesor'];
    
    // Eliminar todas las filas relacionadas con el profesor
    $sql_eliminar_relacionadas = "DELETE FROM dias_profesor WHERE id_profesor = $id_profesor_eliminar;
                                   DELETE FROM materias_profesores WHERE id_profesor = $id_profesor_eliminar;
                                   DELETE FROM Profesores WHERE id = $id_profesor_eliminar";

    if ($conexion->multi_query($sql_eliminar_relacionadas) === TRUE) {
        // Redireccionar a la página actual para actualizar la tabla
        header("Location:".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error al eliminar profesor y sus relaciones: " . $conexion->error;
    }
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
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tablas /</span> Consulta de horario</h4>
                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Consulta de horarios</h5>
                            <div class="table-responsive text-nowrap">
                                <!-- Agregar el formulario de búsqueda de horarios por semestre -->
<div class="container-xxl flex-grow-1 container-p-y">
   
    
    <!-- Formulario para seleccionar el semestre -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="mb-3">
        <div class="mb-3">
            <label for="selectSemestre" class="form-label">Seleccionar semestre:</label>
            <select class="form-select" id="selectSemestre" name="semestre">
                <?php
                // Consultar los semestres disponibles en la base de datos
                $sqlSemestres = "SELECT * FROM Semestres";
                $resultSemestres = $conexion->query($sqlSemestres);

                if ($resultSemestres->num_rows > 0) {
                    while ($rowSemestre = $resultSemestres->fetch_assoc()) {
                        $idSemestre = $rowSemestre['id'];
                        $nombreSemestre = $rowSemestre['nombre_semestre'];
                        echo "<option value='$idSemestre'>$nombreSemestre</option>";
                    }
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <!-- Tabla para mostrar los horarios generados -->
    <div class="card">
        <h5 class="card-header">Horarios generados</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="tabla">
                <thead>
                    <tr>
                        <th>Periodo</th>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th>Día</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                       

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    // Verificar si se ha enviado el formulario y se ha seleccionado un semestre
                    if (isset($_GET['semestre'])) {
                        $semestreSeleccionado = $_GET['semestre'];
                        // Consultar los horarios asociados con el semestre seleccionado
                        $sqlHorarios = "SELECT s.nombre_semestre, m.nombre_materia, p.nombre_profesor, h.dia_semana, h.hora_inicio, h.hora_fin
                                        FROM Horario h
                                        INNER JOIN Semestres s ON h.id_semestre = s.id
                                        INNER JOIN Materias m ON h.id_materia = m.id
                                        INNER JOIN Profesores p ON h.id_profesor = p.id
                                        WHERE s.id = $semestreSeleccionado";
                        $resultHorarios = $conexion->query($sqlHorarios);

                        

                        if ($resultHorarios->num_rows > 0) {
                            while ($rowHorario = $resultHorarios->fetch_assoc()) {
                                
                                echo "<td>" . $rowHorario["nombre_semestre"] . "</td>";
                                echo "<td>" . $rowHorario["nombre_materia"] . "</td>";
                                echo "<td>" . $rowHorario["nombre_profesor"] . "</td>";
                                echo "<td>" . $rowHorario["dia_semana"] . "</td>";
                                echo "<td>" . $rowHorario["hora_inicio"] . "</td>";
                                echo "<td>" . $rowHorario["hora_fin"] . "</td>";
                                echo "<td>";
                               
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No se encontraron horarios para el semestre seleccionado.</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!--borrar--->

                                </tbody>


                                </table>
                            </div>
                        </div>
                        <!--/ Basic Bootstrap Table -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
</body>
</html>