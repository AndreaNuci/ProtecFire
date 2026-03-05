<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body>
    <?php
session_start();

/* Crear usuario si no existe */
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = [
        "nombre" => "Andrea Nuci Vázquez",
        "email" => "andrea.nuci@example.com",
        "telefono" => "55-1234-5678",
        "ubicacion" => "CDMX, México",
        "foto" => "default.png",
        "estado" => "Activo"
    ];
}

$usuario = $_SESSION['usuario'];

$foto = $usuario['foto'] ?? "default.png";

include __DIR__ . "/../vista/modulos/cabeceraUsuario.php";
?>

<div class="perfil-wrapper">

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

<div class="box">
<strong>Skype</strong>
<p><?php echo $usuario['skype'] ?? 'No registrado'; ?></p>
</div>

<div class="box">
<strong>Ubicación</strong>
<p><?php echo $usuario['ubicacion'] ?? ''; ?></p>
</div>

</div>

</div>


<!-- LUGAR MONITOREADO -->

<div class="seccion">

<h4>Lugar monitoreado</h4>

<div class="grid-info">

<div class="box">
<strong>Nombre del lugar</strong>
<p><?php echo $usuario['nombre_lugar'] ?? 'No registrado'; ?></p>
</div>

<div class="box">
<strong>Dirección</strong>
<p><?php echo $usuario['direccion_lugar'] ?? 'No registrada'; ?></p>
</div>

<div class="box">
<strong>Tipo de lugar</strong>
<p><?php echo $usuario['tipo_lugar'] ?? 'Oficina'; ?></p>
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
<strong>Dispositivo</strong>
<p><?php echo $usuario['dispositivo'] ?? 'No disponible'; ?></p>
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