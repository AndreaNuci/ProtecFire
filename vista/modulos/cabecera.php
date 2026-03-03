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
                <link rel="stylesheet" href="/ProtecFire-Nuci/vista/css/index.css">
                <img class="logo" src="/ProtecFire-Nuci/vista/img/logo.jpeg" alt="logo">

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="reportes">Reportes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="alertas.php">Alertas</a>
                    </li>

                    <button class="btn btn-login ms-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Iniciar Sesión
                    </button>

                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔐 MODAL LOGIN -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Iniciar Sesión</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" class="form-control" placeholder="correo@ejemplo.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" placeholder="********" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">
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


    <!-- 📝 MODAL REGISTRO -->
    <div class="modal fade" id="registroModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Crear Cuenta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">
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