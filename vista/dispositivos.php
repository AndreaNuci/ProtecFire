<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dispositivos IoT - Sistema de Incendios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <style>
    body {
      background-color: #ffffff; /* fondo blanco */
      font-family: 'Segoe UI', sans-serif;
    }

    .card-sensor {
      border-radius: 20px;
      padding: 30px;
      min-height: 300px; /* más alargadas */
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    /* Bordes de color según estado */
    .card-online {
      border: 3px solid #22c55e; /* verde */
    }
    .card-offline {
      border: 3px solid #6c757d; /* gris */
    }
    .card-warning {
      border: 3px solid #facc15; /* amarillo */
    }
    .card-danger {
      border: 3px solid #ef4444; /* rojo */
    }

    .sensor-title {
      font-weight: 700;
      font-size: 1.25rem;
      margin-bottom: 15px;
    }

    .sensor-info p {
      margin-bottom: 6px;
      font-size: 0.95rem;
    }

    .status-btn {
      min-width: 120px;
      font-weight: 600;
    }

    .status-online {
      background-color: #22c55e;
      color: #fff;
    }

    .status-offline {
      background-color: #6c757d;
      color: #fff;
    }

    .status-warning {
      background-color: #facc15;
      color: #1a1b1b;
    }

    .status-danger {
      background-color: #ef4444;
      color: #fff;
    }

    .card-sensor:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>
    <!-- Navbar -->
 <?php
    include "modulos/cabeceraUsuario.php"; ?> 

<div class="container py-4">
  <h2 class="fw-bold mb-4">Dispositivos IoT Conectados</h2>

  <div class="row g-4">

    <!-- Cocina -->
    <div class="col-md-6 col-lg-3">
      <div class="card-sensor card-danger">
        <div class="sensor-title">ESP32 Cocina</div>
        <button class="btn status-btn status-online mb-2" onclick="toggleStatus(this)">Conectado</button>
        <div class="sensor-info">
          <p><i class="bi bi-thermometer-half me-2"></i><strong>Temperatura:</strong> 75°C</p>
          <p><i class="bi bi-droplet me-2"></i><strong>Humedad:</strong> 60%</p>
          <p><i class="bi bi-fire me-2"></i><strong>Humo:</strong> Detectado</p>
          <p><i class="bi bi-battery-full me-2"></i><strong>Batería:</strong> 85%</p>
          <p><i class="bi bi-wifi me-2"></i><strong>Señal Wi-Fi:</strong> 78%</p>
          <p class="mb-0"><small class="text-muted">Última actualización: 04/03/2026 19:25</small></p>
        </div>
      </div>
    </div>

    <!-- Sala -->
    <div class="col-md-6 col-lg-3">
      <div class="card-sensor card-warning">
        <div class="sensor-title">ESP32 Sala</div>
        <button class="btn status-btn status-warning mb-2" onclick="toggleStatus(this)">Conectado</button>
        <div class="sensor-info">
          <p><i class="bi bi-thermometer-half me-2"></i><strong>Temperatura:</strong> 55°C</p>
          <p><i class="bi bi-droplet me-2"></i><strong>Humedad:</strong> 45%</p>
          <p><i class="bi bi-fire me-2"></i><strong>Humo:</strong> No detectado</p>
          <p><i class="bi bi-battery-full me-2"></i><strong>Batería:</strong> 92%</p>
          <p><i class="bi bi-wifi me-2"></i><strong>Señal Wi-Fi:</strong> 88%</p>
          <p class="mb-0"><small class="text-muted">Última actualización: 04/03/2026 19:20</small></p>
        </div>
      </div>
    </div>

    <!-- Almacén -->
    <div class="col-md-6 col-lg-3">
      <div class="card-sensor card-normal">
        <div class="sensor-title">ESP32 Almacén</div>
        <button class="btn status-btn status-offline mb-2" onclick="toggleStatus(this)">Desconectado</button>
        <div class="sensor-info">
          <p><i class="bi bi-thermometer-half me-2"></i><strong>Temperatura:</strong> --</p>
          <p><i class="bi bi-droplet me-2"></i><strong>Humedad:</strong> --</p>
          <p><i class="bi bi-fire me-2"></i><strong>Humo:</strong> --</p>
          <p><i class="bi bi-battery-full me-2"></i><strong>Batería:</strong> --</p>
          <p><i class="bi bi-wifi me-2"></i><strong>Señal Wi-Fi:</strong> --</p>
          <p class="mb-0"><small class="text-muted">Última actualización: 04/03/2026 19:10</small></p>
        </div>
      </div>
    </div>

    <!-- Horno -->
    <div class="col-md-6 col-lg-3">
      <div class="card-sensor card-danger">
        <div class="sensor-title">ESP32 Horno</div>
        <button class="btn status-btn status-online mb-2" onclick="toggleStatus(this)">Conectado</button>
        <div class="sensor-info">
          <p><i class="bi bi-thermometer-half me-2"></i><strong>Temperatura:</strong> 95°C</p>
          <p><i class="bi bi-droplet me-2"></i><strong>Humedad:</strong> 30%</p>
          <p><i class="bi bi-fire me-2"></i><strong>Humo:</strong> Detectado</p>
          <p><i class="bi bi-battery-full me-2"></i><strong>Batería:</strong> 80%</p>
          <p><i class="bi bi-wifi me-2"></i><strong>Señal Wi-Fi:</strong> 70%</p>
          <p class="mb-0"><small class="text-muted">Última actualización: 04/03/2026 19:30</small></p>
        </div>
      </div>
    </div>

  </div>
</div><br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Función para cambiar el estado del sensor
  function toggleStatus(btn) {
    if(btn.textContent.trim() === "Conectado") {
      btn.textContent = "Desconectado";
      btn.classList.remove("status-online", "status-warning", "status-danger");
      btn.classList.add("status-offline");
    } else {
      btn.textContent = "Conectado";
      btn.classList.remove("status-offline");
      btn.classList.add("status-online");
    }
  }
</script>
  <?php 
  include "modulos/piePagina.php" ?>
</body>
</html>