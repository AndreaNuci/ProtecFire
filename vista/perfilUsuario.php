

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
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



<div class="perfil-card">

<div class="perfil-top"></div>

<!-- FOTO -->
<div class="foto-container">
<img src="uploads/<?php echo $foto; ?>" class="foto-perfil">
</div>

<div class="perfil-body">

<h2><?php echo $usuario['nombre'] ?? ''; ?></h2>
<p class="subtitulo">
<?php echo $usuario['email'] ?? ''; ?>
</p>

<div class="acciones">

<div class="accion">
<a href="editarPerfil.php">
<span>✏️</span>
Editar perfil
</a>
</div>

<div class="accion">
<a href="cerrarSesion.php">
<span>🔒</span>
Cerrar sesión
</a>
</div>

</div>


<!-- DATOS PERSONALES -->
  <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/usuario.css">
<div class="seccion">

<h4>Datos personales</h4>

<div class="grid-info">

<div class="box">
<strong>Correo electrónico</strong>
<p><?php echo $usuario['email'] ?? ''; ?></p>
</div>

<div class="box">
<strong>Teléfono</strong>
<p><?php echo $usuario['telefono'] ?? ''; ?></p>
</div>



</div>

</div>



<!-- CONTACTOS DE EMERGENCIA -->

<div class="seccion">

<h4>Contactos de emergencia</h4>

<div class="grid-info">

<div class="box">
<strong>Nombre contacto</strong>
<p><?php echo $usuario['contacto_emergencia'] ?? 'No registrado'; ?></p>
</div>

<div class="box">
<strong>Teléfono contacto</strong>
<p><?php echo $usuario['telefono_emergencia'] ?? 'No registrado'; ?></p>
</div>

<div class="box">
<strong>Relación</strong>
<p><?php echo $usuario['relacion_contacto'] ?? 'No registrada'; ?></p>
</div>

<div class="box">
<strong>Contacto secundario</strong>
<p><?php echo $usuario['contacto_secundario'] ?? 'No registrado'; ?></p>
</div>

<div class="box">
<strong>Teléfono secundario</strong>
<p><?php echo $usuario['telefono_secundario'] ?? 'No registrado'; ?></p>
</div>

</div>

</div>


<!-- SEGURIDAD -->

<div class="seccion">

<h4>Seguridad de la cuenta</h4>

<div class="grid-info">

<div class="box">
<strong>Último inicio de sesión</strong>
<p><?php echo $usuario['ultimo_login'] ?? 'No disponible'; ?></p>
</div>


<div class="box">
<strong>Verificación 2FA</strong>
<p><?php echo $usuario['verificacion_2fa'] ?? 'Desactivada'; ?></p>
</div>

</div>

</div>

</div>
</div>
</div>


<?php 
  include "modulos/piePagina.php" ?>
  
</body>
</html>