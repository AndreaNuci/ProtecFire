<?php
include __DIR__ . "/vista/modulos/cabecera.php";

// Datos de sensores
$temperatura = 52;
$humo = 65;
$gas = 40;

// Evaluación de alerta
$nivelAlerta = "Normal";
if($temperatura>60 || $humo>70 || $gas>70) $nivelAlerta="Crítica";
else if($temperatura>45 || $humo>50 || $gas>50) $nivelAlerta="Riesgo";
else if($temperatura>35 || $humo>30 || $gas>30) $nivelAlerta="Preventiva";

$iconos = ["Normal"=>"✅","Preventiva"=>"⚠️","Riesgo"=>"🔥","Crítica"=>"🚨"];

$recomendaciones = [
    "Normal"=>["Todo en orden. Mantén el monitoreo."],
    "Preventiva"=>["Revisa sensores periódicamente.","Atento a cambios de temperatura o humo."],
    "Riesgo"=>["Evacúa si notas peligro.","Verifica detectores y ventilación."],
    "Crítica"=>["Evacúa inmediatamente.","Llama a emergencias.","No intentes apagar solo el incendio."]
];
?>

<section class="seccion-alertas py-5">
    <div class="container">
        <h2 class="titulo-alertas mb-5 text-center">Panel de Alertas IoT</h2>

        <div class="row g-4 justify-content-center">

            <!-- Tarjeta Temperatura -->
            <div class="col-md-3">
                <div class="tarjeta-sensor p-4 rounded shadow text-center">
                    <i class="bi bi-thermometer-half fs-1 mb-2"></i>
                    <h5>Temperatura</h5>
                    <p class="fs-4"><?php echo $temperatura; ?> °C</p>
                </div>
            </div>

            <!-- Tarjeta Humo -->
            <div class="col-md-3">
                <div class="tarjeta-sensor p-4 rounded shadow text-center">
                    <i class="bi bi-cloud-haze2 fs-1 mb-2"></i>
                    <h5>Humo</h5>
                    <p class="fs-4"><?php echo $humo; ?> %</p>
                </div>
            </div>

            <!-- Tarjeta Gas -->
            <div class="col-md-3">
                <div class="tarjeta-sensor p-4 rounded shadow text-center">
                    <i class="bi bi-flask fs-1 mb-2"></i>
                    <h5>Gas</h5>
                    <p class="fs-4"><?php echo $gas; ?> %</p>
                </div>
            </div>

            <!-- Tarjeta Nivel de Alerta -->
            <div class="col-md-6">
                <div class="tarjeta-alerta p-4 rounded shadow text-center">
                    <div class="alerta-icono mb-3"><?php echo $iconos[$nivelAlerta]; ?></div>
                    <h4>Nivel: <?php echo $nivelAlerta; ?></h4>
                </div>
            </div>

            <!-- Tarjeta Recomendaciones -->
            <div class="col-md-6">
                <div class="tarjeta-recomendaciones p-4 rounded shadow">
                    <h5 class="mb-3 text-center">Recomendaciones</h5>
                    <ul class="list-unstyled mb-0">
                        <?php foreach($recomendaciones[$nivelAlerta] as $rec): ?>
                        <li class="mb-2"><i class="bi bi-check-circle me-2"></i><?php echo $rec; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . "/vista/modulos/piePagina.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>