<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre           = htmlspecialchars($_POST['nombre'] ?? 'No proporcionado');
    $email            = htmlspecialchars($_POST['email'] ?? 'No proporcionado');
    $edad             = htmlspecialchars($_POST['edad'] ?? 'No proporcionado');
    $anime_favorito   = htmlspecialchars($_POST['anime_favorito'] ?? 'No proporcionado');
    $genero           = htmlspecialchars($_POST['genero'] ?? 'No proporcionado');
    $calificacion     = htmlspecialchars($_POST['calificacion'] ?? 'No proporcionado');
    $episodios_vistos = htmlspecialchars($_POST['episodios_vistos'] ?? 'No proporcionado');
    $recomendar       = ($_POST['recomendar'] ?? 'no') === 'si' ? 'Sí' : 'No';
    $newsletter       = isset($_POST['newsletter']) ? 'Sí' : 'No';
    $razon            = htmlspecialchars($_POST['razon'] ?? 'No proporcionado');
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Gracias! | Anime World</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-black d-flex align-items-center min-vh-100" style="font-family:'Roboto',sans-serif">

    <div class="container">
        <div class="card bg-dark border-secondary shadow mx-auto" style="max-width:700px">
            <div class="card-body p-5 text-center">
                <h1 class="display-4 fw-bold mb-4" style="color:#f47521">¡Gracias por tu envío!</h1>
                <hr class="border-secondary">
                <div class="text-start fs-5">
                    <p><span style="color:#f47521" class="fw-bold">Nombre:</span> <?= $nombre ?></p>
                    <p><span style="color:#f47521" class="fw-bold">Email:</span> <?= $email ?></p>
                    <p><span style="color:#f47521" class="fw-bold">Edad:</span> <?= $edad ?></p>
                    <p><span style="color:#f47521" class="fw-bold">Anime Favorito:</span> <?= $anime_favorito ?></p>
                    <p><span style="color:#f47521" class="fw-bold">Género:</span> <?= ucfirst($genero) ?></p>
                    <p><span style="color:#f47521" class="fw-bold">Calificación:</span> <?= $calificacion ?>/10</p>
                    <p><span style="color:#f47521" class="fw-bold">Episodios:</span> <?= $episodios_vistos ?></p>
                    <p><span style="color:#f47521" class="fw-bold">¿Recomendar?</span> <?= $recomendar ?></p>
                    <p><span style="color:#f47521" class="fw-bold">Newsletter:</span> <?= $newsletter ?></p>
                    <p><span style="color:#f47521" class="fw-bold">Razón:</span><br><em><?= nl2br($razon) ?></em></p>
                </div>
                <a href="index.php" class="btn mt-4 py-3 px-5 fw-bold" style="background:#f47521; color:black">Volver al Inicio</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } else { header("Location: index.php"); exit; } ?>