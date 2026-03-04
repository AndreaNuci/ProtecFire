<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Administrador - ProtecFire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tu CSS -->
    <link rel="stylesheet" href="vista/css/index.css">

</head>

<body>


<!-- NAVBAR ADMIN (MISMO DISEÑO QUE INDEX) -->
<nav class="navbar navbar-expand-lg navbar-custom">

<div class="container">

<img class="logo" src="vista/img/logo.jpeg" alt="logo">

<button class="navbar-toggler bg-light" 
type="button" 
data-bs-toggle="collapse" 
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="index.php">Inicio</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Sensores</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Alertas</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Zonas</a>
</li>

<li class="nav-item">
<a class="nav-link text-warning fw-bold">Administrador</a>
</li>

<li class="nav-item">
<a class="nav-link text-light" href="index.php">
Cerrar sesión
</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- PANEL ADMIN -->
<div class="container mt-5">

<h2 class="text-center mb-4">
Panel de Administración IoT 🔥
</h2>

<p class="text-center">
Sistema de monitoreo en tiempo real de temperatura, humo y gases.
</p>


<div class="row mt-4">

<!-- TEMPERATURA -->
<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h4>🌡 Temperatura</h4>

<h1 class="text-danger">
32°C
</h1>

<p>
Sensor funcionando correctamente
</p>

</div>
</div>
</div>



<!-- HUMO -->
<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h4>💨 Humo</h4>

<h1 class="text-warning">
Normal
</h1>

<p>
Sin presencia de humo
</p>

</div>
</div>
</div>



<!-- GAS -->
<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h4>☢ Gas</h4>

<h1 class="text-success">
Seguro
</h1>

<p>
Niveles permitidos
</p>

</div>
</div>
</div>


</div>



<!-- ALERTAS -->
<div class="row mt-5">

<div class="col-12">

<div class="card shadow">

<div class="card-header bg-danger text-white">

<h5>⚠ Alertas del Sistema</h5>

</div>

<div class="card-body">

<table class="table">

<thead>

<tr>

<th>Zona</th>
<th>Sensor</th>
<th>Valor</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

<tr>

<td>Zona 1</td>
<td>Temperatura</td>
<td>45°C</td>
<td class="text-danger">
ALERTA
</td>

</tr>

<tr>

<td>Zona 2</td>
<td>Humo</td>
<td>Detectado</td>
<td class="text-warning">
Precaución
</td>

</tr>

<tr>

<td>Zona 3</td>
<td>Gas</td>
<td>Normal</td>
<td class="text-success">
Seguro
</td>

</tr>

</tbody>

</table>

</div>

</div>

</div>

</div>



<!-- ZONAS CRITICAS -->
<div class="row mt-5">

<div class="col-12">

<div class="card shadow">

<div class="card-header bg-dark text-white">

<h5>Zonas Críticas</h5>

</div>

<div class="card-body">

<ul>

<li>Zona 1 - Riesgo Alto</li>
<li>Zona 2 - Riesgo Medio</li>
<li>Zona 3 - Riesgo Bajo</li>

</ul>

</div>

</div>

</div>

</div>


</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>