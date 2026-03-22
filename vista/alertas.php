<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Alertas - Sistema de Incendios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .table thead th {
      background-color: #690f0f;
      color: white;
    }
    .alert-type {
      font-weight: bold;
    }
    .alert-fire {
      color: #dc3545; /* Rojo */
    }
    .alert-warning {
      color: #ffc107; /* Amarillo */
    }
    .alert-info {
      color: #0dcaf0; /* Azul */
    }
    .scrollable-table {
      max-height: 500px;
      overflow-y: auto;
    }
  </style>
</head>
<body>
<?php
    include "modulos/cabeceraUsuario.php"; ?> 
<div class="container py-4">
  <h2 class="fw-bold mb-4">Registro Histórico de Alertas</h2>

  <div class="scrollable-table">
    <table class="table table-striped table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Tipo de Alerta</th>
          <th>Mensaje</th>
          <th>Ubicación</th>
          <th>Fecha y Hora</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td class="alert-type alert-fire"><i class="bi bi-fire me-1"></i> Humo</td>
          <td>Se detectó humo en la cocina principal.</td>
          <td>Cocina</td>
          <td>04/03/2026 19:20</td>
        </tr>
        <tr>
          <td>2</td>
          <td class="alert-type alert-warning"><i class="bi bi-exclamation-triangle-fill me-1"></i> Temperatura</td>
          <td>Temperatura elevada en la sala de máquinas.</td>
          <td>Sala de Máquinas</td>
          <td>04/03/2026 19:15</td>
        </tr>
        <tr>
          <td>3</td>
          <td class="alert-type alert-info"><i class="bi bi-bell me-1"></i> Información</td>
          <td>Sistema revisado correctamente por el técnico.</td>
          <td>Oficina Principal</td>
          <td>04/03/2026 19:00</td>
        </tr>
        <!-- Aquí se pueden agregar más registros dinámicamente -->
          <tr>
          <td>1</td>
          <td class="alert-type alert-fire"><i class="bi bi-fire me-1"></i> Humo</td>
          <td>Se detectó humo en la cocina principal.</td>
          <td>Cocina</td>
          <td>04/03/2026 19:20</td>
        </tr>
        <tr>
          <td>2</td>
          <td class="alert-type alert-warning"><i class="bi bi-exclamation-triangle-fill me-1"></i> Temperatura</td>
          <td>Temperatura elevada en la sala de máquinas.</td>
          <td>Sala de Máquinas</td>
          <td>04/03/2026 19:15</td>
        </tr>
        <tr>
          <td>3</td>
          <td class="alert-type alert-info"><i class="bi bi-bell me-1"></i> Información</td>
          <td>Sistema revisado correctamente por el técnico.</td>
          <td>Oficina Principal</td>
          <td>04/03/2026 19:00</td>
        </tr>
      </tbody>
    </table>
  </div>
</div><br><br>
   <?php 
  include "modulos/piePagina.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>