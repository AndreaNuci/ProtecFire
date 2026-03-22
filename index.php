<?php
ob_start();
session_start();

require_once "config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "controlador/plantilla.controlador.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();

