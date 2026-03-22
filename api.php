<?php
header("Content-Type: application/json; charset=UTF-8");

$mensaje = trim($_POST["mensaje"] ?? "");

if ($mensaje === "") {
    echo json_encode([
        "respuesta" => "Escribe algo"
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$token = "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";

$systemPrompt = "Eres un asistente virtual del sistema ProtecFire, una plataforma IoT para la detección y prevención de incendios.

Tu función es ayudar a los usuarios con información clara, breve y útil sobre incendios, humo, gases, sensores y alertas.

Reglas:
- Responde en español
- Sé claro y directo
- No des respuestas largas
- Da recomendaciones prácticas
- Si es una emergencia, indica llamar al 911
- No inventes información técnica compleja
- Si la pregunta no trata sobre incendios, humo, gas, sensores o seguridad, responde amablemente que solo puedes ayudar en esos temas

Contexto del sistema:
ProtecFire monitorea temperatura, humo y gases en tiempo real usando sensores IoT (como ESP32). Detecta riesgos y genera alertas automáticas.";

$data = [
    "model" => "katanemo/Arch-Router-1.5B:hf-inference",
    "messages" => [
        [
            "role" => "system",
            "content" => $systemPrompt
        ],
        [
            "role" => "user",
            "content" => $mensaje
        ]
    ],
    "max_tokens" => 180,
    "temperature" => 0.7
];

$options = [
    "http" => [
        "header" => "Content-Type: application/json\r\nAuthorization: Bearer $token",
        "method" => "POST",
        "content" => json_encode($data),
        "timeout" => 60
    ]
];

$context = stream_context_create($options);
$response = file_get_contents("https://router.huggingface.co/v1/chat/completions", false, $context);
$resultado = json_decode($response, true);

$respuesta = $resultado["choices"][0]["message"]["content"] ?? "El modelo no devolvió texto.";

echo json_encode([
    "respuesta" => trim($respuesta)
], JSON_UNESCAPED_UNICODE);
]);

?>
