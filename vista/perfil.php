<?php
session_start();

// Si no existe usuario, lo creamos por defecto
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = [
        "nombre" => "Andrea Nuci Vázquez",
        "email" => "andrea.nuci@example.com",
        "telefono" => "55-1234-5678",
        "skype" => "andrea.nuci",
        "ubicacion" => "CDMX, México",
        "estado" => "Out of office",
        "foto" => "default.png"
    ];
}

$usuario = $_SESSION['usuario'];

// Definir foto
$foto = isset($usuario['foto']) ? $usuario['foto'] : 'default.png';

// Definir color del estado
$color = "bg-success";
if ($usuario['estado'] == "Out of office") {
    $color = "bg-warning text-dark";
}

include __DIR__ . "/../vista/modulos/cabecera.php";
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Mi Perfil</h4>

                    <div class="d-flex gap-2">
                        <a href="editarPerfil.php" class="btn btn-danger rounded-pill px-4">
                            Editar Perfil
                        </a>

                        <a href="cerrarSesion.php" class="btn btn-dark rounded-pill px-4">
                            Cerrar sesión
                        </a>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-4 mb-4">

                    <img src="uploads/<?php echo $foto; ?>"
                         class="rounded-circle border border-4 border-light shadow"
                         width="160" height="160"
                         style="object-fit: cover;">

                    <div>
                        <h3 class="fw-bold mb-1">
                            <?php echo $usuario['nombre']; ?>
                        </h3>

                        <span class="badge <?php echo $color; ?>">
                            <?php echo $usuario['estado']; ?>
                        </span>
                    </div>
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 shadow-sm">
                            <small class="text-muted">Correo electrónico</small>
                            <p class="fw-semibold mb-0">
                                <?php echo $usuario['email']; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 shadow-sm">
                            <small class="text-muted">Teléfono</small>
                            <p class="fw-semibold mb-0">
                                <?php echo $usuario['telefono']; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 shadow-sm">
                            <small class="text-muted">Skype</small>
                            <p class="fw-semibold mb-0">
                                <?php echo $usuario['skype']; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 shadow-sm">
                            <small class="text-muted">Ubicación</small>
                            <p class="fw-semibold mb-0">
                                <?php echo $usuario['ubicacion']; ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<?php include __DIR__ . "/../vista/modulos/piePagina.php"; ?>