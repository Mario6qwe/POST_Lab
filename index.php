<?php
// Verificar si el formulario fue enviado mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre'] ?? 'No proporcionado');
    $email = htmlspecialchars($_POST['email'] ?? 'No proporcionado');
    $edad = htmlspecialchars($_POST['edad'] ?? 'No proporcionado');
    $anime_favorito = htmlspecialchars($_POST['anime_favorito'] ?? 'No proporcionado');
    $genero = htmlspecialchars($_POST['genero'] ?? 'No proporcionado');
    $calificacion = htmlspecialchars($_POST['calificacion'] ?? 'No proporcionado');
    $episodios_vistos = htmlspecialchars($_POST['episodios_vistos'] ?? 'No proporcionado');
    $recomendar = htmlspecialchars($_POST['recomendar'] ?? 'No especificado');
    $newsletter = isset($_POST['newsletter']) ? 'Sí' : 'No';
    $razon = htmlspecialchars($_POST['razon'] ?? 'No proporcionado');
    // Generar la página de respuesta con los datos recibidos
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Formulario Procesado - Anime World</title>
        <!-- Enlace a fuentes externas para consistencia con la página principal -->
        <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>
        <!-- Bootstrap CSS -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #121212;
                color: #ffffff;
            }
            h1 {
                color: #f47521;
            }
            strong {
                color: #f47521;
            }
            a {
                color: #f47521;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body class='d-flex justify-content-center align-items-center min-vh-100'>
        <div class='container bg-dark p-4 rounded shadow text-light' style='max-width: 600px;'>
            <h1 class='text-center'>¡Gracias por tu envío!</h1>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Edad:</strong> $edad</p>
            <p><strong>Anime Favorito:</strong> $anime_favorito</p>
            <p><strong>Género:</strong> $genero</p>
            <p><strong>Calificación:</strong> $calificacion</p>
            <p><strong>Episodios Vistos:</strong> $episodios_vistos</p>
            <p><strong>¿Lo Recomendarías?</strong> $recomendar</p>
            <p><strong>Suscribirse a Newsletter:</strong> $newsletter</p>
            <p><strong>Razón:</strong> $razon</p>
            <a href='index.html' class='d-block text-center fw-bold mt-3'>Volver a la página principal</a>
        </div>
    </body>
    </html>";
} else {
    // Si no es POST, redirige a index.html
    header("Location: index.html");
    exit;
}
?>