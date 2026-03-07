<?php
// Conexión original para entorno local (XAMPP)
//$conexion = new mysqli("localhost", "root", "", "incendios");
// Conexión para entorno Docker
$conexion = new mysqli("db", "root", "root", "incendios");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
/*?>*/