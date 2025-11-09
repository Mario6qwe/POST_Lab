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
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #121212;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .container {
                background-color: #1e1e1e;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                max-width: 600px;
                width: 100%;
                text-align: left;
            }
            h1 {
                color: #f47521;
                text-align: center;
            }
            p {
                margin: 10px 0;
                line-height: 1.6;
            }
            strong {
                color: #f47521;
            }
            a {
                display: block;
                text-align: center;
                color: #f47521;
                text-decoration: none;
                font-weight: bold;
                margin-top: 20px;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>¡Gracias por tu envío!</h1>
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
            <a href='index.html'>Volver a la página principal</a>
        </div>
    </body>
    </html>";
} else {
    // Si no es POST, redirige a index.html
    header("Location: index.html");
    exit;
}
?>