<?php
session_start();

/* ==========================
SI NO EXISTE USUARIO
========================== */

if (!isset($_SESSION['usuario'])) {

    $_SESSION['usuario'] = [
        "nombre" => "Andrea Nuci Vázquez",
        "email" => "andrea.nuci@example.com",
        "telefono" => "55-1234-5678",
        "skype" => "andrea.nuci",
        "ubicacion" => "CDMX, México",
        "estado" => "Out of office",

        "nombre_lugar" => "",
        "direccion_lugar" => "",
        "tipo_lugar" => "",

        "contacto_emergencia" => "",
        "telefono_emergencia" => "",
        "relacion_contacto" => "",

        "contacto_secundario" => "",
        "telefono_secundario" => "",

        "foto" => "default.png"
    ];
}

/* ==========================
PROCESAR FORMULARIO
========================== */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_SESSION['usuario'];

    /* FOTO */

    if (!empty($_FILES['foto']['name'])) {

        $nombreFoto = time() . "_" . basename($_FILES['foto']['name']);
        $rutaDestino = __DIR__ . "/uploads/" . $nombreFoto;

        move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);

        $usuario['foto'] = $nombreFoto;
    }

    /* DATOS PERSONALES */

    $usuario['nombre'] = $_POST['nombre'];
    $usuario['email'] = $_POST['email'];
    $usuario['telefono'] = $_POST['telefono'];
    $usuario['skype'] = $_POST['skype'];
    $usuario['ubicacion'] = $_POST['ubicacion'];
    $usuario['estado'] = $_POST['estado'];

    /* LUGAR */

    $usuario['nombre_lugar'] = $_POST['nombre_lugar'];
    $usuario['direccion_lugar'] = $_POST['direccion_lugar'];
    $usuario['tipo_lugar'] = $_POST['tipo_lugar'];

    /* CONTACTOS */

    $usuario['contacto_emergencia'] = $_POST['contacto_emergencia'];
    $usuario['telefono_emergencia'] = $_POST['telefono_emergencia'];
    $usuario['relacion_contacto'] = $_POST['relacion_contacto'];

    $usuario['contacto_secundario'] = $_POST['contacto_secundario'];
    $usuario['telefono_secundario'] = $_POST['telefono_secundario'];

    $_SESSION['usuario'] = $usuario;

    header("Location: perfil.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$foto = $usuario['foto'] ?? "default.png";

include __DIR__ . "/../vista/modulos/cabecera.php";
?>

<div class="perfil-wrapper">

<div class="perfil-card">

<div class="perfil-top"></div>

<form method="POST" enctype="multipart/form-data">

<!-- FOTO -->
<div class="foto-container">

<img src="uploads/<?php echo $foto; ?>" class="foto-perfil">

<br><br>

<label class="btn-cambiar-foto">
📷 Cambiar foto
<input type="file" name="foto">
</label>

</div>


<div class="perfil-body">

<!-- NOMBRE -->

<h2>
<input type="text"
name="nombre"
value="<?php echo $usuario['nombre']; ?>"
class="form-control mb-2">
</h2>

<!-- EMAIL SOLO VISUAL -->

<p class="subtitulo">
<?php echo $usuario['email']; ?>
</p>


<!-- BOTONES -->

<div class="acciones">

<div class="accion">

<button type="submit" class="btn-guardar">
💾 Guardar cambios
</button>

</div>

<div class="accion">

<a href="perfil.php" class="btn-cancelar">
↩ Cancelar
</a>

</div>

</div>


<!-- DATOS PERSONALES -->

<div class="seccion">

<h4>Datos personales</h4>

<div class="grid-info">

<div class="box">
<strong>Correo electrónico</strong>
<input type="email"
name="email"
value="<?php echo $usuario['email']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Teléfono</strong>
<input type="text"
name="telefono"
value="<?php echo $usuario['telefono']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Skype</strong>
<input type="text"
name="skype"
value="<?php echo $usuario['skype']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Ubicación</strong>
<input type="text"
name="ubicacion"
value="<?php echo $usuario['ubicacion']; ?>"
class="form-control">
</div>

</div>

</div>


<!-- LUGAR MONITOREADO -->

<div class="seccion">

<h4>Lugar monitoreado</h4>

<div class="grid-info">

<div class="box">
<strong>Nombre del lugar</strong>
<input type="text"
name="nombre_lugar"
value="<?php echo $usuario['nombre_lugar']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Dirección</strong>
<input type="text"
name="direccion_lugar"
value="<?php echo $usuario['direccion_lugar']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Tipo de lugar</strong>
<input type="text"
name="tipo_lugar"
value="<?php echo $usuario['tipo_lugar']; ?>"
class="form-control">
</div>

</div>

</div>


<!-- CONTACTOS DE EMERGENCIA -->

<div class="seccion">

<h4>Contactos de emergencia</h4>

<div class="grid-info">

<div class="box">
<strong>Nombre contacto</strong>
<input type="text"
name="contacto_emergencia"
value="<?php echo $usuario['contacto_emergencia']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Teléfono contacto</strong>
<input type="text"
name="telefono_emergencia"
value="<?php echo $usuario['telefono_emergencia']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Relación</strong>
<input type="text"
name="relacion_contacto"
value="<?php echo $usuario['relacion_contacto']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Contacto secundario</strong>
<input type="text"
name="contacto_secundario"
value="<?php echo $usuario['contacto_secundario']; ?>"
class="form-control">
</div>

<div class="box">
<strong>Teléfono secundario</strong>
<input type="text"
name="telefono_secundario"
value="<?php echo $usuario['telefono_secundario']; ?>"
class="form-control">
</div>

</div>

</div>

</div>
</form>

</div>
</div>

<?php include __DIR__ . "/../vista/modulos/piePagina.php"; ?>