<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <?php
    include "modulos/cabecera.php";
    include "modulos/banner.php";
    ?>

    <?php

/* Simulación de datos IoT */
$temperatura = 52;
$humo = 65;
$gas = 40;

$nivelAlerta = "Normal";

if($temperatura > 60 || $humo > 70 || $gas > 70){
    $nivelAlerta = "Critica";
}
else if($temperatura > 45 || $humo > 50 || $gas > 50){
    $nivelAlerta = "Riesgo";
}
else if($temperatura > 35 || $humo > 30 || $gas > 30){
    $nivelAlerta = "Preventiva";
}
?>


    <section class="estadisticas py-5">
        <div class="container">
            <div class="row justify-content-center text-center g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="card-estadistica p-4">
                        <h4 class="titulo-card">Incendios urbanos al año</h4>
                        <h2 class="contador" data-target="45000">0</h2>
                        <p>Promedio anual en México</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-estadistica p-4">
                        <h4 class="titulo-card">Emergencias atendidas</h4>
                        <h2 class="contador" data-target="120000">0</h2>
                        <p>Reportes en casa habitación</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-estadistica p-4">
                        <h4 class="titulo-card">Estados con más reportes</h4>
                        <h5>CDMX, Estado de México y Jalisco</h5>
                        <p>Zonas con mayor incidencia urbana</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 🔥 SOBRE NOSOTROS -->
    <section class="sobre-nosotros py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold titulo-seccion">Sobre Nosotros</h2>
                <p class="text-muted">
                    Tecnología inteligente para la prevención y monitoreo de incendios.
                </p>
            </div>

            <div class="row align-items-center">

                <!-- TEXTO -->
                <div class="col-lg-6 mb-4">
                    <p class="descripcion">
                        Proctec Fire es una plataforma diseñada para ayudarte a prevenir incendios
                        y mantener tu entorno seguro en todo momento.
                    </p>

                    <p class="descripcion">
                        Nuestro sistema detecta cambios importantes como aumento de temperatura,
                        presencia de humo o gases peligrosos, enviando alertas inmediatas
                        cuando algo no está funcionando con normalidad.
                    </p>

                    <p class="descripcion">
                        Desde la aplicación puedes ver la información en tiempo real,
                        recibir notificaciones de riesgo y utilizar nuestro ChatBot inteligente
                        que te brinda recomendaciones claras para actuar rápidamente
                        y evitar situaciones peligrosas.
                    </p>


                </div>

                <!-- IMAGEN -->
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <img src="vista/img/iot.jpeg"
                        class="img-fluid imagen-sobre"
                        alt="Monitoreo IoT">
                </div>

            </div>
        </div>

    </section>
    <div class="row text-center mt-5">

        <div class="col-md-3 col-6 mb-4">
            <div class="beneficio-card p-3">
                <i class="bi bi-activity icono-beneficio"></i>
                <p class="mt-3">Monitoreo en tiempo real</p>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
            <div class="beneficio-card p-3">
                <i class="bi bi-thermometer-half icono-beneficio"></i>
                <p class="mt-3">Alertas por temperatura anormal</p>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
            <div class="beneficio-card p-3">
                <i class="bi bi-cloud-haze2 icono-beneficio"></i>
                <p class="mt-3">Detección de humo y gases</p>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
            <div class="beneficio-card p-3">
                <i class="bi bi-robot icono-beneficio"></i>
                <p class="mt-3">ChatBot con sugerencias</p>
            </div>
        </div>
    </div>

    <section class="contacto py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="titulo-contacto">Contáctanos</h2>
            <p class="subtitulo-contacto">
                ¿Tienes dudas o necesitas información? Estamos para ayudarte.
            </p>
        </div>

        <div class="row justify-content-center align-items-center">

            <!-- Información lateral -->
            <div class="col-lg-4 mb-4">
                <div class="info-contacto p-4">
                    <h5>Información</h5>
                    <p><strong>📍 Dirección:</strong> Ciudad de México</p>
                    <p><strong>📞 Teléfono:</strong> +52 55 1234 5678</p>
                    <p><strong>✉ Correo:</strong> contacto@proctecfire.com</p>
                </div>
            </div>

            <!-- Formulario -->
            <div class="col-lg-6">
                <div class="card-contacto p-4 p-md-5">

                    <form>
                        <div class="row">

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Nombre completo</label>
                                <input type="text" class="form-control input-contacto" placeholder="Tu nombre">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control input-contacto" placeholder="correo@ejemplo.com">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Mensaje</label>
                                <textarea rows="5" class="form-control input-contacto" placeholder="Escribe tu mensaje aquí..."></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-enviar px-5 py-2">
                                    Enviar mensaje
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="vista/js/cajitas.js"></script>

    <?php

    include "modulos/piePagina.php";
    ?>
</body>

</html>