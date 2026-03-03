<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Incendios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vista/css/index.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <img class="logo" src="vista/img/logo.jpeg" alt="logo">

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Alertas</a>
                    </li>

                    <button class="btn btn-login ms-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Iniciar Sesión
                    </button>

                </ul>
            </div>
        </div>
    </nav>

  <?php 
  include "modelo/conexion.php";
  include "controlador/registro.php";
  ?>  
<!-- 🔐 MODAL LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Cabecera roja -->
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Iniciar Sesión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" class="form-control" placeholder="********" required>
                    </div>

                    <button type="submit" name="iniciar" class="btn btn-danger w-100">
                        Entrar
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small>
                        ¿Todavía no tienes cuenta?
                        <a href="#" data-bs-toggle="modal" data-bs-target="#registroModal" data-bs-dismiss="modal" class="text-danger fw-bold">
                            Regístrate
                        </a>
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal de mensajes -->
<div class="modal fade" id="mensajeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Cabecera gris clarito -->
            <div class="modal-header bg-light text-dark">
                <h5 class="modal-title fw-bold">Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Cuerpo del mensaje -->
            <div class="modal-body">
                <p id="mensajeTexto">
                    <?php 
                    if(isset($_SESSION['mensaje'])) { 
                        echo $_SESSION['mensaje']; 
                        unset($_SESSION['mensaje']); 
                    } 
                    ?>
                </p>
            </div>

            <!-- Botón rojo pequeño a la derecha -->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para abrir modal automáticamente si hay mensaje -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var mensajeTexto = document.getElementById('mensajeTexto');
    if (mensajeTexto && mensajeTexto.textContent.trim() !== "") {
        var mensajeModal = new bootstrap.Modal(document.getElementById('mensajeModal'));
        mensajeModal.show();
    }
});
</script>


  <!-- 📝 MODAL REGISTRO -->
<div class="modal fade" id="registroModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Crear Cuenta</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action=""> <!-- Enviar al mismo archivo -->
                    <div class="mb-3">
                        <label class="form-label">Nombre completo</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número</label>
                        <input type="number" name="telefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" class="form-control" required>
                    </div>
                    <button type="submit" name="registrar" class="btn btn-danger w-100">
                        Registrarse
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small>
                        ¿Ya tienes cuenta?
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal" class="text-danger fw-bold">
                            Inicia sesión
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de mensajes -->
<div class="modal fade" id="mensajeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Cabecera gris clarito -->
            <div class="modal-header bg-light text-dark">
                <h5 class="modal-title fw-bold">Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Cuerpo del mensaje -->
            <div class="modal-body">
                <p id="mensajeTexto">
                    <?php 
                    if(isset($_SESSION['mensaje'])) { 
                        echo $_SESSION['mensaje']; 
                        unset($_SESSION['mensaje']); 
                    } 
                    ?>
                </p>
            </div>

            <!-- Botón rojo pequeño a la derecha -->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para abrir modal automáticamente si hay mensaje -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var mensajeTexto = document.getElementById('mensajeTexto');
    if (mensajeTexto && mensajeTexto.textContent.trim() !== "") {
        var mensajeModal = new bootstrap.Modal(document.getElementById('mensajeModal'));
        mensajeModal.show();
    }
});
</script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    let cambiarModal = false;

    const loginModal = document.getElementById('loginModal');
    const registroModal = document.getElementById('registroModal');

    // Detectamos cuando el usuario hace clic en cambiar modal
    document.querySelectorAll('[data-bs-target="#registroModal"], [data-bs-target="#loginModal"]').forEach(btn => {
        btn.addEventListener('click', function () {
            cambiarModal = true;
        });
    });

    // Cuando se cierre login
    loginModal.addEventListener('hidden.bs.modal', function () {
        if (!cambiarModal) {
            location.reload();
        }
        cambiarModal = false;
    });

    // Cuando se cierre registro
    registroModal.addEventListener('hidden.bs.modal', function () {
        if (!cambiarModal) {
            location.reload();
        }
        cambiarModal = false;
    });

});
</script>
</body>

</html>