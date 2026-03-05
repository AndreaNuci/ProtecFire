<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/sildevar.css">
  <link rel="stylesheet" href="css/perfil.css">
</head>

<body>
  <!-- ===== SIDEBAR ===== -->
  <nav class="navbar navbar-expand-lg navbar-user">
    <div class="container-fluid">

      <a class="navbar-brand" href="#">
        <img src="img/logo.jpeg" width="40" class="me-2">
        Proctec Fire
      </a>

      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="usuario.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../vista/dispositivos.php">Dispositivos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="alertDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Alertas
              <span class="badge bg-danger" id="alertCount">3</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="alertDropdown" style="min-width: 300px;">
              <!-- Notificación 1 -->
              <li>
                <a class="dropdown-item d-flex align-items-start" href="#">
                  <i class="bi bi-fire text-danger me-2 fs-5"></i>
                  <div>
                    <div class="fw-bold">Humo detectado</div>
                    <small class="text-muted">Cocina · Hace 2 min</small>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <!-- Notificación 2 -->
              <li>
                <a class="dropdown-item d-flex align-items-start" href="#">
                  <i class="bi bi-exclamation-triangle-fill text-warning me-2 fs-5"></i>
                  <div>
                    <div class="fw-bold">Temperatura elevada</div>
                    <small class="text-muted">Sala de máquinas · Hace 5 min</small>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <!-- Notificación 3 -->
              <li>
                <a class="dropdown-item d-flex align-items-start" href="#">
                  <i class="bi bi-bell text-info me-2 fs-5"></i>
                  <div>
                    <div class="fw-bold">Revisión del sistema</div>
                    <small class="text-muted">Oficina · Hace 15 min</small>
                  </div>
                </a>
              </li>
              <!-- Si quieres agregar un enlace a ver todas -->
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-center fw-bold" href="../vista/alertas.php">Ver todas las alertas</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../vista/perfilUsuario.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Cerrar Sesión</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <!-- CONTENIDO PRINCIPAL -->
  <div class="main-content">
</body>

</html>