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
$sqlSemestres = "SELECT id, nombre_semestre FROM semestres";
$resultSemestres = $conn->query($sqlSemestres);

// Consulta SQL para obtener las materias
$sqlMaterias = "SELECT id, nombre_materia FROM materias";
$resultMaterias = $conn->query($sqlMaterias);
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Horario</title>

    <meta name="description" content="" />

    <!-- Favicon -->
  

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

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
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                 
                >                 
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

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Horario/</span> Crear horario</h4>
  
               <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Horario</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="generar_horario2.php">
                                            <!-- Selector de semestre -->
                                            <div>
                                                <label for="semestre" class="form-label">Selecciona el periodo</label>
                                                <select id="semestre" name="semestre" class="form-select form-select-sm">
                                                    <?php
                                                    if ($resultSemestres->num_rows > 0) {
                                                        while ($row = $resultSemestres->fetch_assoc()) {
                                                            echo "<option value='" . $row["id"] . "'>" . $row["nombre_semestre"] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- Selección de materias -->
                                            <div>
                                                <label for="materias" class="form-label">Selecciona las materias</label><br>
                                                <?php
                                                if ($resultMaterias->num_rows > 0) {
                                                    while ($row = $resultMaterias->fetch_assoc()) {
                                                        echo "<input type='checkbox' id='materia" . $row["id"] . "' name='materias[]' value='" . $row["id"] . "' class='form-check-input'>";
                                                        echo "<label for='materia" . $row["id"] . "' class='form-check-label'>" . $row["nombre_materia"] . "</label><br>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <!-- Generar horario -->
                                            <button type="submit" class="btn btn-primary">Generar horario</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--TABLA_HORARIO-->
                    
                    <!--TERMINA-TABLA_HORARIO-->
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- Core JS -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>