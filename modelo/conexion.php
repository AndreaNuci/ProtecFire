<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "incendios";

try {

    $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET NAMES utf8");

} catch (PDOException $e) {

    echo "Error de conexión: " . $e->getMessage();
}