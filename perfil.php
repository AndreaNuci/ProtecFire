<?php
include __DIR__ . "/vista/modulos/cabecera.php";

// Datos de usuario (simulados)
$usuario = [
    "nombre" => "Andrea Nuci Vázquez",
    "email" => "andrea.nuci@example.com",
    "telefono" => "55-1234-5678",
    "direccion" => "Av. Reforma 123, CDMX, México",
    "rol" => "Administrador",
    "registro" => "2023-05-28"
];

$iconos = [
    "nombre" => "👤",
    "email" => "📧",
    "telefono" => "📞",
    "direccion" => "🏠",
    "rol" => "🛡️",
    "registro" => "🗓️"
];
?>

<section class="seccion-perfil py-5">
    <div class="container">
        <h2 class="titulo-perfil mb-5 text-center">Perfil de Usuario</h2>

        <div class="row g-4 justify-content-center">

            <?php foreach($usuario as $clave => $valor): ?>
            <div class="col-md-4">
                <div class="tarjeta-perfil p-4 rounded shadow text-center">
                    <div class="perfil-icono mb-3"><?php echo $iconos[$clave]; ?></div>
                    <h5 class="mb-2 text-capitalize"><?php echo $clave; ?></h5>
                    <p class="fs-5"><?php echo $valor; ?></p>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Botón Editar Perfil -->
            <div class="col-12 text-center mt-4">
                <a href="editarPerfil.php" class="btn btn-primary btn-lg">
                    <i class="bi bi-pencil-fill"></i> Editar Perfil
                </a>
            </div>

        </div>
    </div>
</section>

<?php include __DIR__ . "/vista/modulos/piePagina.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>