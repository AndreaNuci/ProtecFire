<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Restaurante IoT</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/usuario.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
</head>
<body>

<!-- Navbar -->
 <?php
    include "modulos/cabeceraUsuario.php"; ?> 

<!-- Banner de alerta -->
<div class="container mt-4">
  <div class="alert custom-alert d-flex align-items-center rounded-4 border-0" role="alert">
    
    <div class="me-3 fs-3">
      <i class="bi bi-exclamation-triangle-fill"></i>
    </div>

    <div class="flex-grow-1">
      <h6 class="mb-1 fw-bold text-white">🔥 Alerta Crítica</h6>
      <small class="text-white">Humo detectado en la Cocina • 10:42 AM</small>
    </div>

    <span class="badge status-badge px-3 py-2 rounded-pill">
      ACTIVA
    </span>

  </div>
</div>
<!-- Contenedor principal -->
<div class="container my-4">

  <!-- Zonas / Sensores -->
  <div class="row g-4 mb-4">

    <!-- Cocina -->
    <div class="col-md-3">
      <div class="card-sensor card-danger text-center">
        <h5 class="mb-3">🔥 Cocina</h5>
        <p>Humo: <span class="sensor-status">400 ppm</span></p>
        <p>Temperatura: <span class="sensor-status">60°C</span></p>
      </div>
    </div>

    <!-- Sala -->
    <div class="col-md-3">
      <div class="card-sensor card-normal text-center">
        <h5 class="mb-3">🛋 Sala</h5>
        <p>Humo: <span class="sensor-status">50 ppm</span></p>
        <p>Temperatura: <span class="sensor-status">25°C</span></p>
      </div>
    </div>

    <!-- Almacén -->
    <div class="col-md-3">
      <div class="card-sensor card-warning text-center">
        <h5 class="mb-3">📦 Almacén</h5>
        <p>Gas: <span class="sensor-status">70 ppm</span></p>
        <p>Temperatura: <span class="sensor-status">22°C</span></p>
      </div>
    </div>

    <!-- Horno -->
    <div class="col-md-3">
      <div class="card-sensor card-danger text-center">
        <h5 class="mb-3">🔥 Horno</h5>
        <p>Temperatura: <span class="sensor-status">80°C</span></p>
      </div>
    </div>

  </div>

  <!-- Gráficas -->
  <!-- Gráficas -->
<div class="row g-4">

  <!-- Cocina - Línea -->
  <div class="col-md-6">
    <div class="card-sensor">
      <h5 class="text-center mb-3">🔥 Temperatura Cocina</h5>
      <canvas id="graficaCocina"></canvas>
    </div>
  </div>

  <!-- Sala - Barra -->
  <div class="col-md-6">
    <div class="card-sensor">
      <h5 class="text-center mb-3">🛋 Temperatura Sala</h5>
      <canvas id="graficaSala"></canvas>
    </div>
  </div>

  <!-- Almacén - Radar -->
  <div class="col-md-6">
    <div class="card-sensor">
      <h5 class="text-center mb-3">📦 Gas Almacén</h5>
      <canvas id="graficaAlmacen"></canvas>
    </div>
  </div>

  <!-- Horno - Doughnut -->
  <div class="col-md-6">
    <div class="card-sensor">
      <h5 class="text-center mb-3">🔥 Nivel Horno</h5>
      <canvas id="graficaHorno"></canvas>
    </div>
  </div>

</div>
</div>
<!-- Chatbot -->
<div id="chatbot">
  <h5>Chatbot</h5>
  <div id="chat-content" style="height: 150px; overflow-y: auto; margin-bottom: 10px; color: #fff;">
    <p>🤖 Hola, se detectó humo en la cocina. Evacúa y llama a emergencias.</p>
  </div>
  <input type="text" class="form-control form-control-sm" placeholder="Escribe aquí..." />
</div>
  <?php 
  include "modulos/piePagina.php" ?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script>
Chart.defaults.color = "#616364";

/* 🔥 Cocina - Línea */
new Chart(document.getElementById('graficaCocina'), {
  type: 'line',
  data: {
    labels: ['12:00','12:10','12:20','12:30','12:40','12:50'],
    datasets: [{
      label: 'Temp °C',
      data: [25,30,35,45,50,60],
      borderColor: '#ef4444',
      backgroundColor: 'rgba(239,68,68,0.2)',
      tension: 0.4,
      fill: true
    }]
  }
});

/* 🛋 Sala - Barras */
new Chart(document.getElementById('graficaSala'), {
  type: 'bar',
  data: {
    labels: ['12:00','12:10','12:20','12:30','12:40','12:50'],
    datasets: [{
      label: 'Temp °C',
      data: [22,23,24,25,26,25],
      backgroundColor: '#22c55e'
    }]
  }
});

/* 📦 Almacén - Radar */
new Chart(document.getElementById('graficaAlmacen'), {
  type: 'radar',
  data: {
    labels: ['Gas','Temp','Humedad','Ventilación','Riesgo'],
    datasets: [{
      label: 'Nivel',
      data: [70,22,40,60,50],
      backgroundColor: 'rgba(250,204,21,0.3)',
      borderColor: '#facc15'
    }]
  }
});

/* 🔥 Horno - Doughnut */
new Chart(document.getElementById('graficaHorno'), {
  type: 'doughnut',
  data: {
    labels: ['Seguro','Alerta','Crítico'],
    datasets: [{
      data: [20,30,50],
      backgroundColor: ['#22c55e','#facc15','#ef4444']
    }]
  }
});
</script>
<script>
function actualizarEstado(card, valor, limiteNormal, limiteWarning) {
  card.classList.remove("card-normal", "card-warning", "card-danger");

  if (valor < limiteNormal) {
    card.classList.add("card-normal");
  } else if (valor < limiteWarning) {
    card.classList.add("card-warning");
  } else {
    card.classList.add("card-danger");
  }
}

/* Ejemplo para Cocina */
const cocinaCard = document.querySelectorAll(".card-sensor")[0];
actualizarEstado(cocinaCard, 400, 100, 300);
</script>

</body>
</html>