<?php

header("Content-Type: application/json");

$mensaje = $_POST["mensaje"] ?? "";

if($mensaje==""){
    echo json_encode([
        "respuesta"=>"Escribe algo"
    ]);
    exit;
}

$apiKey = "AIzaSyADpMNU2BAGRsvEhq-vV7ID3XDfC69Sz-0";

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=".$apiKey;


$prompt = "Eres un asistente experto en prevención de incendios para un sistema IoT.

Responde claro y corto.

Pregunta del usuario:
".$mensaje;


$data = [
"contents"=>[
[
"parts"=>[
[
"text"=>$prompt
]
]
]
]
];

$options = [
"http"=>[
"header"=>"Content-Type: application/json",
"method"=>"POST",
"content"=>json_encode($data)
]
];

$context = stream_context_create($options);

$response = file_get_contents($url,false,$context);

$resultado = json_decode($response,true);

$respuesta = $resultado["candidates"][0]["content"]["parts"][0]["text"] ?? "Sin respuesta";


echo json_encode([
"respuesta"=>$respuesta
]);

?>