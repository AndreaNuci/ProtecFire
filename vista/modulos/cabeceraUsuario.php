<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <img class="logo" src="img/logo.jpeg" alt="logo">

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>

                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle position-relative" href="#" id="notificacionesDropdown" role="button" data-bs-toggle="dropdown">
        <i class="bi bi-bell-fill fs-5"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            3
        </span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
        <li><h6 class="dropdown-header">Notificaciones</h6></li>
        <li><a class="dropdown-item" href="#">🔥 Incendio detectado en Zona Norte</a></li>
        <li><a class="dropdown-item" href="#">⚠ Sensor desconectado</a></li>
        <li><a class="dropdown-item" href="#">✅ Sistema funcionando correctamente</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-center text-primary" href="#">Ver todas</a></li>
    </ul>
</li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Cerrar sesión</a>
                    </li>

                  

                </ul>
            </div>
        </div>
    </nav>

</body>
</html>