<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vista/css/index.css">
</head>

<body>
    <!-- 🔥 BANNER CAROUSEL -->
    <div id="bannerIncendios" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <!-- SLIDE 1 -->
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1507668077129-56e32842fceb"
                    class="d-block w-100 banner-img" alt="Incendio">

                <div class="carousel-caption banner-overlay">
                    <h1 class="fw-bold">Protege tu entorno</h1>
                    <p>Sistema inteligente de detección y prevención de incendios.</p>
                    <a href="#" class="btn btn-danger btn-lg"
                        data-bs-toggle="modal"
                        data-bs-target="#registroModal">
                        Registrarse Ahora
                    </a>
                </div>
            </div>

            <!-- SLIDE 2 -->
            <div class="carousel-item">
                <img src="vista/img/bannerchat.png"
                    class="d-block w-100 banner-img" alt="Chatbot">

                <div class="carousel-caption banner-overlay">
                    <h1 class="fw-bold">ChatBot Inteligente</h1>
                    <p>Recibe sugerencias y recomendaciones en tiempo real ante riesgos de incendio.</p>
                    <a href="#" class="btn btn-danger btn-lg"
                        data-bs-toggle="modal"
                        data-bs-target="#registroModal">
                        Crear Cuenta
                    </a>
                </div>
            </div>

            <!-- SLIDE 3 -->
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d"
                    class="d-block w-100 banner-img" alt="Temperatura">

                <div class="carousel-caption banner-overlay">
                    <h1 class="fw-bold">Alertas Automáticas</h1>
                    <p>Notificaciones cuando se detecta temperatura fuera de lo normal o riesgo alto.</p>
                    <a href="#" class="btn btn-danger btn-lg"
                        data-bs-toggle="modal"
                        data-bs-target="#registroModal">
                        Únete Hoy
                    </a>
                </div>
            </div>

        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerIncendios" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#bannerIncendios" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</body>

</html>