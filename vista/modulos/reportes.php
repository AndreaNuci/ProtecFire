<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes - Sistema IoT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tu CSS -->
    <link rel="stylesheet" href="vista/css/index.css">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<!-- 🔥 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🔥 FireIoT</a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="#">Reportes</a>
                </li>
                <li class="nav-item ms-3">
                    <button class="btn btn-login">Cerrar sesión</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- 🔥 HEADER REPORTES -->
<section class="py-5 text-center" style="background-color:#1E1E1E; color:white;">
    <div class="container">
        <h1 class="fw-bold">Panel de Reportes</h1>
        <p>Monitoreo y registro histórico de eventos detectados por el sistema IoT</p>
    </div>
</section>

<!-- 🔥 TARJETAS RESUMEN -->
<section class="container py-5">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow card-estadistica p-4 text-center mostrar">
                <i class="bi bi-fire icono-beneficio"></i>
                <h5 class="titulo-card mt-3">Incidentes Detectados</h5>
                <p class="contador">24</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow card-estadistica p-4 text-center mostrar">
                <i class="bi bi-thermometer-high icono-beneficio"></i>
                <h5 class="titulo-card mt-3">Temperatura Máxima</h5>
                <p class="contador">78°C</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow card-estadistica p-4 text-center mostrar">
                <i class="bi bi-exclamation-triangle icono-beneficio"></i>
                <h5 class="titulo-card mt-3">Alertas Críticas</h5>
                <p class="contador">5</p>
            </div>
        </div>

    </div>
</section>

<!-- 🔥 TABLA DE REPORTES -->
<section class="container pb-5">
    <div class="card shadow-lg">
        <div class="card-header text-white" style="background-color:#C62828;">
            <h5 class="mb-0">Historial de Eventos</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Ubicación</th>
                            <th>Temperatura</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>#001</td>
                            <td>02/03/2026</td>
                            <td>Almacén A</td>
                            <td>65°C</td>
                            <td><span class="badge bg-warning">Riesgo Medio</span></td>
                        </tr>

                        <tr>
                            <td>#002</td>
                            <td>02/03/2026</td>
                            <td>Oficina Central</td>
                            <td>80°C</td>
                            <td><span class="badge bg-danger">Alerta Crítica</span></td>
                        </tr>

                        <tr>
                            <td>#003</td>
                            <td>01/03/2026</td>
                            <td>Área Técnica</td>
                            <td>45°C</td>
                            <td><span class="badge bg-success">Normal</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- 🔥 FOOTER -->
<footer class="footer-custom text-white text-center py-4">
    <p class="mb-0">© 2026 FireIoT - Sistema Inteligente de Prevención de Incendios</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>