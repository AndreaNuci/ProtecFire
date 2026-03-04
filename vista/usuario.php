
    
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
    include "modulos/cabeceraUsuario.php"; ?> <br><br>

<!-- Banner de alerta -->
<div class="container mt-3">
  <div class="alert alert-danger d-flex align-items-center shadow-lg rounded-4 border-0" role="alert">
    
    <div class="me-3 fs-2">
      <i class="bi bi-exclamation-triangle-fill"></i>
    </div>

    <div class="flex-grow-1">
      <h6 class="mb-1 fw-bold">🔥 Alerta Crítica</h6>
      <small>Humo detectado en la Cocina • 10:42 AM</small>
    </div>

    <span class="badge bg-dark px-3 py-2 rounded-pill">
      ACTIVA
    </span>

  </div>
</div>
<!-- Contenedor principal -->
<div class="container my-4">

  <!-- Zonas / Sensores -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>Cocina</h5>
        <p>Humo: <span class="sensor-status status-danger">400 ppm</span></p>
        <p>Temperatura: <span class="sensor-status status-danger">60°C</span></p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>Sala</h5>
        <p>Humo: <span class="sensor-status status-normal">50 ppm</span></p>
        <p>Temperatura: <span class="sensor-status status-normal">25°C</span></p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>Almacén</h5>
        <p>Gas: <span class="sensor-status status-warning">70 ppm</span></p>
        <p>Temperatura: <span class="sensor-status status-normal">22°C</span></p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>Horno</h5>
        <p>Temperatura: <span class="sensor-status status-danger">80°C</span></p>
      </div>
    </div>
  </div>

  <!-- Gráficas -->
  <div class="row g-3">
    <div class="col-md-6">
      <div class="card p-3">
        <h5 class="text-center">Temperatura Cocina</h5>
        <canvas id="tempCocina"></canvas>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card p-3">
        <h5 class="text-center">Nivel de Humo Cocina</h5>
        <canvas id="humoCocina"></canvas>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script>
  const ctxTemp = document.getElementById('tempCocina').getContext('2d');
  const tempChart = new Chart(ctxTemp, {
    type: 'line',
    data: {
      labels: ['12:00','12:10','12:20','12:30','12:40','12:50'],
      datasets: [{
        label: 'Temperatura (°C)',
        data: [25, 30, 35, 45, 50, 60],
        borderColor: '#dc3545',
        backgroundColor: 'rgba(220,53,69,0.2)',
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { labels: { color: '#fff' } } },
      scales: {
        x: { ticks: { color: '#fff' }, grid: { color: '#333' } },
        y: { ticks: { color: '#fff' }, grid: { color: '#333' } }
      }
    }
  });

  const ctxHumo = document.getElementById('humoCocina').getContext('2d');
  const humoChart = new Chart(ctxHumo, {
    type: 'line',
    data: {
      labels: ['12:00','12:10','12:20','12:30','12:40','12:50'],
      datasets: [{
        label: 'Humo (ppm)',
        data: [50, 80, 120, 250, 300, 400],
        borderColor: '#ffc107',
        backgroundColor: 'rgba(255,193,7,0.2)',
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { labels: { color: '#fff' } } },
      scales: {
        x: { ticks: { color: '#fff' }, grid: { color: '#333' } },
        y: { ticks: { color: '#fff' }, grid: { color: '#333' } }
      }
    }
  });
</script>

</body>
</html>
