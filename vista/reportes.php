<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Reportes - ProtecFire</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/index.css">

</head>

<body>


<!-- NAVBAR (IGUAL AL INDEX) -->
<nav class="navbar navbar-expand-lg navbar-custom">

<div class="container">

<img class="logo" src="img/logo.jpeg" alt="logo">

<button class="navbar-toggler bg-light" 
type="button" 
data-bs-toggle="collapse" 
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="../index.php">Inicio</a>
</li>

<li class="nav-item">
<a class="nav-link text-warning fw-bold">Reportes</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Alertas</a>
</li>

<li class="nav-item">
<a class="nav-link" href="admin.php">Administrador</a>
</li>

</ul>

</div>

</div>

</nav>



<!-- TITULO -->

<div class="container mt-5 text-center">

<h2>

📊 Reportes de Sensores IoT

</h2>

<p>

Historial de temperatura, humo y gases registrados por el sistema.

</p>

</div>



<!-- FILTROS -->

<div class="container mt-4">

<div class="card shadow">

<div class="card-body">

<div class="row">

<div class="col-md-4">

<label>Zona</label>

<select class="form-control">

<option>Todas</option>
<option>Zona 1</option>
<option>Zona 2</option>
<option>Zona 3</option>

</select>

</div>


<div class="col-md-4">

<label>Sensor</label>

<select class="form-control">

<option>Todos</option>
<option>Temperatura</option>
<option>Humo</option>
<option>Gas</option>

</select>

</div>


<div class="col-md-4">

<label>Fecha</label>

<input type="date" class="form-control">

</div>

</div>

</div>

</div>

</div>



<!-- TABLA REPORTES -->

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-danger text-white">

<h5>

Historial de Registros

</h5>

</div>

<div class="card-body">

<table class="table table-striped">

<thead>

<tr>

<th>ID</th>
<th>Zona</th>
<th>Sensor</th>
<th>Valor</th>
<th>Estado</th>
<th>Fecha</th>

</tr>

</thead>

<tbody>

<tr>

<td>1</td>
<td>Zona 1</td>
<td>Temperatura</td>
<td>34°C</td>
<td class="text-success">Normal</td>
<td>03/03/2026</td>

</tr>


<tr>

<td>2</td>
<td>Zona 2</td>
<td>Humo</td>
<td>Detectado</td>
<td class="text-warning">Precaución</td>
<td>03/03/2026</td>

</tr>


<tr>

<td>3</td>
<td>Zona 1</td>
<td>Gas</td>
<td>Alto</td>
<td class="text-danger">Alerta</td>
<td>03/03/2026</td>

</tr>


<tr>

<td>4</td>
<td>Zona 3</td>
<td>Temperatura</td>
<td>28°C</td>
<td class="text-success">Seguro</td>
<td>03/03/2026</td>

</tr>


</tbody>

</table>

</div>

</div>

</div>



<!-- BOTON DESCARGA -->

<div class="container mt-4 text-center">

<button class="btn btn-danger">

Descargar Reporte PDF

</button>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>