<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Perfil</title>

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/usuario.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include "modulos/cabeceraUsuario.php"; ?>

<div class="perfil-card">

<div class="perfil-top"></div>

<form method="POST" enctype="multipart/form-data">

<!-- FOTO -->
<div class="foto-container">

<img src="uploads/default.png" class="foto-perfil">

<br><br>

<label class="btn-cambiar-foto">
📷 Cambiar foto
<input type="file" name="foto">
</label>

</div>

<div class="perfil-body">

<!-- NOMBRE -->

<h2>
<input type="text"
name="nombre"
value="Andrea Nuci Vázquez"
class="form-control mb-2">
</h2>

<!-- EMAIL SOLO VISUAL -->

<p class="subtitulo">
andrea.nuci@example.com
</p>


<!-- BOTONES -->

<div class="acciones">

<div class="accion">
<button type="submit" class="btn-guardar">
💾 Guardar cambios
</button>
</div>

<div class="accion">
<a href="perfil.php" class="btn-cancelar">
↩ Cancelar
</a>
</div>

</div>


<!-- DATOS PERSONALES -->

<div class="seccion">

<h4>Datos personales</h4>

<div class="grid-info">

<div class="box">
<strong>Correo electrónico</strong>
<input type="email"
name="email"
value="andrea.nuci@example.com"
class="form-control">
</div>

<div class="box">
<strong>Teléfono</strong>
<input type="text"
name="telefono"
value="5512345678"
class="form-control">
</div>

</div>

</div>


<!-- CONTACTOS DE EMERGENCIA -->

<div class="seccion">

<h4>Contactos de emergencia</h4>

<div class="grid-info">

<div class="box">
<strong>Nombre contacto</strong>
<input type="text"
name="contacto_emergencia"
value="Juan Pérez"
class="form-control">
</div>

<div class="box">
<strong>Teléfono contacto</strong>
<input type="text"
name="telefono_emergencia"
value="5519987766"
class="form-control">
</div>

<div class="box">
<strong>Relación</strong>
<input type="text"
name="relacion_contacto"
value="Padre"
class="form-control">
</div>

<div class="box">
<strong>Contacto secundario</strong>
<input type="text"
name="contacto_secundario"
value="María López"
class="form-control">
</div>

<div class="box">
<strong>Teléfono secundario</strong>
<input type="text"
name="telefono_secundario"
value="5512233445"
class="form-control">
</div>

</div>

</div>

</div>
</form>

</div>
</div>

<?php include "modulos/piePagina.php" ?>

</body>
</html>