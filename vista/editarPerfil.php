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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ==========================
    // PROCESAR FOTO
    // ==========================
    if (!empty($_FILES['foto']['name'])) {

        $nombreFoto = time() . "_" . basename($_FILES['foto']['name']);
        $rutaDestino = __DIR__ . "/uploads/" . $nombreFoto;

        move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);

    } else {
        // Mantener foto anterior
        $nombreFoto = $_SESSION['usuario']['foto'];
    }

    // ==========================
    // GUARDAR DATOS EN SESSION
    // ==========================
    $_SESSION['usuario'] = [
        "nombre" => $_POST['nombre'],
        "email" => $_POST['email'],
        "telefono" => $_POST['telefono'],
        "skype" => $_POST['skype'],
        "ubicacion" => $_POST['ubicacion'],
        "estado" => $_POST['estado'],
        "foto" => $nombreFoto
    ];

    header("Location: perfil.php");
    exit();
}

$usuario = $_SESSION['usuario'];

include __DIR__ . "/../vista/modulos/cabecera.php";
?>

<div class="container py-5">
    <div class="card shadow-lg p-4 rounded-4">

        <h4 class="mb-4 fw-bold">Editar Perfil</h4>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="nombre" class="form-control mb-3"
                   value="<?php echo $usuario['nombre']; ?>" required>

            <input type="email" name="email" class="form-control mb-3"
                   value="<?php echo $usuario['email']; ?>" required>

            <input type="text" name="telefono" class="form-control mb-3"
                   value="<?php echo $usuario['telefono']; ?>">

            <input type="text" name="skype" class="form-control mb-3"
                   value="<?php echo $usuario['skype']; ?>">

            <input type="text" name="ubicacion" class="form-control mb-3"
                   value="<?php echo $usuario['ubicacion']; ?>">

            <select name="estado" class="form-select mb-3">
                <option <?php if($usuario['estado']=="Activo") echo "selected"; ?>>Activo</option>
                <option <?php if($usuario['estado']=="Out of office") echo "selected"; ?>>Out of office</option>
            </select>

            <div class="mb-3">
                <label class="form-label">Foto de Perfil</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-danger w-100 rounded-pill">
                Guardar Cambios
            </button>

        </form>

    </div>
</div>

<?php include __DIR__ . "/../vista/modulos/piePagina.php"; ?>