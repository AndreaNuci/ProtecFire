<?php
session_start();

// Vaciar variables de sesión
$_SESSION = [];

// Destruir sesión
session_destroy();

// Evitar volver atrás con el navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Redirigir
header("Location: perfil.php");
exit();