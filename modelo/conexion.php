<?php
$conexion = new mysqli("localhost", "root", "", "incendios");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>