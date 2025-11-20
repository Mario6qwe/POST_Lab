<?php
// Verificar si el formulario fue enviado mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar datos
    $nombre            = htmlspecialchars($_POST['nombre'] ?? 'No proporcionado');
    $email             = htmlspecialchars($_POST['email'] ?? 'No proporcionado');
    $edad              = htmlspecialchars($_POST['edad'] ?? 'No proporcionado');
    $anime_favorito    = htmlspecialchars($_POST['anime_favorito'] ?? 'No proporcionado');
    $genero            = htmlspecialchars($_POST['genero'] ?? 'No proporcionado');
    $calificacion      = htmlspecialchars($_POST['calificacion'] ?? 'No proporcionado');
    $episodios_vistos  = htmlspecialchars($_POST['episodios_vistos'] ?? 'No proporcionado');
    $recomendar        = htmlspecialchars($_POST['recomendar'] ?? 'No especificado');
    $newsletter        = isset($_POST['newsletter']) ? 'Sí' : 'No';
    $razon             = htmlspecialchars($_POST['razon'] ?? 'No proporcionado');
    echo '<!DOCTYPE html>
    <html lang="es" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gracias | Anime World</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { font-family: "Roboto", sans-serif; }
            .text-crunchy { color: #f47521 !important; }
            .btn-crunchy { background-color: #f47521; color: #000; font-weight: bold; }
            .btn-crunchy:hover { background-color: #e0641b; color: #000; }
        </style>
    </head>
    <body class="bg-black d-flex align-items-center min-vh-100 py-4">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">

                    <div class="card bg-dark border-secondary shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h1 class="display-5 fw-bold text-crunchy mb-4">¡Gracias por tu envío!</h1>
                            
                            <hr class="border-secondary">

                            <div class="text-start fs-5">
                                <p><span class="text-crunchy fw-bold">Nombre:</span> '.$nombre.'</p>
                                <p><span class="text-crunchy fw-bold">Email:</span> '.$email.'</p>
                                <p><span class="text-crunchy fw-bold">Edad:</span> '.$edad.'</p>
                                <p><span class="text-crunchy fw-bold">Anime Favorito:</span> '.$anime_favorito.'</p>
                                <p><span class="text-crunchy fw-bold">Género:</span> '.$genero.'</p>
                                <p><span class="text-crunchy fw-bold">Calificación:</span> '.$calificacion.'/10</p>
                                <p><span class="text-crunchy fw-bold">Episodios vistos:</span> '.$episodios_vistos.'</p>
                                <p><span class="text-crunchy fw-bold">¿Lo recomendarías?</span> '.ucfirst($recomendar).'</p>
                                <p><span class="text-crunchy fw-bold">Newsletter:</span> '.$newsletter.'</p>
                                <p><span class="text-crunchy fw-bold">Razón:</span><br><em>'.$razon.'</em></p>
                            </div>

                            <hr class="border-secondary mt-4">

                            <a href="index.html" class="btn btn-crunchy w-100 mt-3 py-3 fs-5">
                                ← Volver a la página principal
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';
    
} else {
    // Si no es POST → redirigir
    header("Location: index.html");
    exit;
}
?>