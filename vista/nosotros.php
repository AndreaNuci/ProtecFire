<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - ProtecFire</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS ANIMATION -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<?php 
include __DIR__ . "/modulos/cabecera.php"; ?>

<!-- HERO -->
<section class="bg-dark text-white text-center py-5" data-aos="fade-down">
    <div class="container">
        <h1 class="fw-bold display-4">Sobre Nosotros</h1>
        <p class="lead mt-3">
            ProtecFire protege vidas con tecnología preventiva contra incendios 🔥
        </p>
        <a href="../index.php" class="btn btn-danger mt-3">
            Contáctanos
        </a>
    </div>
</section>

<!-- QUIÉNES SOMOS -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <h2 class="fw-bold">¿Quiénes somos?</h2>
                <p>
                    <strong>ProtecFire</strong> es una plataforma tecnológica enfocada en la prevención
                    y monitoreo de incendios mediante sistemas basados en IoT.
                </p>
                <p>
                    Nuestro objetivo es proteger hogares, negocios e industrias mediante sensores,
                    alertas en tiempo real y monitoreo continuo.
                </p>
            </div>

            <div class="col-lg-6 text-center" data-aos="fade-left">
                <img src="img/logo.jpeg" class="img-fluid rounded shadow" alt="ProtecFire">
            </div>

        </div>
    </div>
</section>

<!-- QUÉ HACEMOS -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h2 class="fw-bold mb-5" data-aos="fade-up">¿Qué hacemos?</h2>

        <div class="row">

            <div class="col-md-4 mb-4" data-aos="zoom-in">
                <i class="bi bi-thermometer-sun fs-1 text-danger"></i>
                <h5 class="mt-3">Detección inteligente</h5>
                <p>Sensores IoT detectan humo, fuego y temperatura en tiempo real.</p>
            </div>

            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="150">
                <i class="bi bi-phone fs-1 text-primary"></i>
                <h5 class="mt-3">Alertas inmediatas</h5>
                <p>Notificaciones automáticas al usuario en caso de emergencia.</p>
            </div>

            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <i class="bi bi-shield-lock fs-1 text-success"></i>
                <h5 class="mt-3">Monitoreo 24/7</h5>
                <p>Supervisión constante para garantizar la seguridad del entorno.</p>
            </div>

        </div>

    </div>
</section>

<!-- MISIÓN Y VISIÓN -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-6 mb-4" data-aos="fade-up">
                <div class="p-4 shadow rounded bg-white h-100">
                    <i class="bi bi-bullseye fs-1 text-danger"></i>
                    <h4 class="mt-3">Misión</h4>
                    <p>
                        Desarrollar soluciones tecnológicas inteligentes que detecten incendios en tiempo real,
                        reduciendo riesgos y protegiendo vidas humanas.
                    </p>
                </div>
            </div>

            <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 shadow rounded bg-white h-100">
                    <i class="bi bi-eye fs-1 text-primary"></i>
                    <h4 class="mt-3">Visión</h4>
                    <p>
                        Ser líder en prevención de incendios a nivel nacional mediante innovación tecnológica IoT.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- VALORES -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h2 class="fw-bold mb-5" data-aos="fade-up">Nuestros Valores</h2>

        <div class="row">

            <div class="col-md-3 col-6 mb-4" data-aos="flip-left">
                <i class="bi bi-shield-check fs-1 text-success"></i>
                <p class="mt-2">Seguridad</p>
            </div>

            <div class="col-md-3 col-6 mb-4" data-aos="flip-left" data-aos-delay="150">
                <i class="bi bi-lightbulb fs-1 text-warning"></i>
                <p class="mt-2">Innovación</p>
            </div>

            <div class="col-md-3 col-6 mb-4" data-aos="flip-left" data-aos-delay="300">
                <i class="bi bi-people fs-1 text-primary"></i>
                <p class="mt-2">Compromiso</p>
            </div>

            <div class="col-md-3 col-6 mb-4" data-aos="flip-left" data-aos-delay="450">
                <i class="bi bi-heart fs-1 text-danger"></i>
                <p class="mt-2">Responsabilidad</p>
            </div>

        </div>

    </div>
</section>

<!-- CTA FINAL -->
<section class="bg-dark text-white text-center py-5" data-aos="zoom-in">
    <div class="container">
        <h3 class="fw-bold">¿Listo para proteger tu hogar o negocio?</h3>
        <p class="mt-2">Únete a ProtecFire y mantente siempre seguro.</p>
        <a href="registro.php" class="btn btn-danger mt-3">
            Comenzar ahora
        </a>
    </div>
</section>

<?php include "modulos/piePagina.php"; ?>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS SCRIPT -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 900,
    once: true
  });
</script>

</body>
</html>