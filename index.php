<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>¡Gracias! - Anime World</title>
        <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>
        <script src='https://cdn.tailwindcss.com'></script>
        <style>
            body { 
                font-family: 'Roboto', sans-serif;
                overflow-x: hidden;
            }

            /* Confeti animado */
            .confetti {
                position: fixed;
                width: 10px;
                height: 10px;
                top: -10px;
                z-index: 1;
                animation: confetti-fall 3s linear infinite;
            }

            @keyframes confetti-fall {
                to {
                    transform: translateY(100vh) rotate(360deg);
                    opacity: 0;
                }
            }

            /* Animación de entrada del contenedor */
            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(100px) scale(0.9);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            .slide-in-up {
                animation: slideInUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            /* Efecto de check animado */
            @keyframes checkmark {
                0% {
                    stroke-dashoffset: 100;
                }
                100% {
                    stroke-dashoffset: 0;
                }
            }

            .checkmark {
                stroke-dasharray: 100;
                animation: checkmark 0.8s ease-in-out 0.4s forwards;
            }

            /* Círculo de éxito */
            @keyframes circle-grow {
                0% {
                    transform: scale(0);
                    opacity: 0;
                }
                50% {
                    transform: scale(1.1);
                }
                100% {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            .success-circle {
                animation: circle-grow 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            /* Animación de texto */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .fade-in {
                animation: fadeIn 0.6s ease-out forwards;
                opacity: 0;
            }

            .fade-in-delay-1 { animation-delay: 0.2s; }
            .fade-in-delay-2 { animation-delay: 0.3s; }
            .fade-in-delay-3 { animation-delay: 0.4s; }
            .fade-in-delay-4 { animation-delay: 0.5s; }
            .fade-in-delay-5 { animation-delay: 0.6s; }
            .fade-in-delay-6 { animation-delay: 0.7s; }
            .fade-in-delay-7 { animation-delay: 0.8s; }
            .fade-in-delay-8 { animation-delay: 0.9s; }
            .fade-in-delay-9 { animation-delay: 1s; }
            .fade-in-delay-10 { animation-delay: 1.1s; }

            /* Efecto de brillo */
            @keyframes shine {
                0% { background-position: -200%; }
                100% { background-position: 200%; }
            }

            .shine-text {
                background: linear-gradient(90deg, #ff9800 0%, #fff 50%, #ff9800 100%);
                background-size: 200% auto;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                animation: shine 3s linear infinite;
            }

            /* Partículas de fondo */
            .particles {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 0;
            }

            .particle {
                position: absolute;
                width: 4px;
                height: 4px;
                background: rgba(255, 152, 0, 0.6);
                border-radius: 50%;
                animation: float 15s infinite ease-in-out;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
                10% { opacity: 1; }
                90% { opacity: 1; }
                100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
            }

            /* Efecto de resplandor en el botón */
            @keyframes glow-pulse {
                0%, 100% {
                    box-shadow: 0 0 20px rgba(255, 152, 0, 0.5);
                }
                50% {
                    box-shadow: 0 0 40px rgba(255, 152, 0, 0.8);
                }
            }

            .glow-btn {
                animation: glow-pulse 2s infinite;
            }

            /* Hover effect para datos */
            .data-item {
                transition: all 0.3s ease;
            }

            .data-item:hover {
                transform: translateX(10px);
                background: rgba(255, 152, 0, 0.1);
                padding-left: 1.5rem;
                border-left: 4px solid #ff9800;
            }

            /* Estrellas para la calificación */
            @keyframes star-twinkle {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.5; transform: scale(0.8); }
            }

            .star {
                display: inline-block;
                color: #ff9800;
                animation: star-twinkle 1.5s infinite;
            }
        </style>
    </head>
    <body class='bg-[#121212] text-white min-h-screen flex items-center justify-center p-4'>
        
        <!-- Partículas de fondo -->
        <div class='particles' id='particles'></div>

        <div class='bg-[#1e1e1e] p-8 rounded-lg shadow-2xl max-w-2xl w-full border border-orange-500 relative z-10 slide-in-up'>
            
            <!-- Icono de éxito -->
            <div class='flex justify-center mb-6'>
                <svg class='success-circle' width='80' height='80' viewBox='0 0 80 80'>
                    <circle cx='40' cy='40' r='35' fill='none' stroke='#ff9800' stroke-width='4'/>
                    <path class='checkmark' d='M25 40 L35 50 L55 30' fill='none' stroke='#ff9800' stroke-width='4' stroke-linecap='round'/>
                </svg>
            </div>

            <h1 class='text-4xl font-bold text-center mb-2 shine-text fade-in'>¡Gracias por tu envío!</h1>
            <p class='text-center text-gray-400 mb-8 fade-in fade-in-delay-1'>Hemos recibido tu información correctamente</p>
            
            <div class='space-y-4 text-lg'>
                <div class='data-item p-3 rounded fade-in fade-in-delay-2'>
                    <span class='text-orange-500 font-bold'>👤 Nombre:</span> $nombre
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-3'>
                    <span class='text-orange-500 font-bold'>📧 Email:</span> $email
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-4'>
                    <span class='text-orange-500 font-bold'>🎂 Edad:</span> $edad años
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-5'>
                    <span class='text-orange-500 font-bold'>🎌 Anime Favorito:</span> $anime_favorito
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-6'>
                    <span class='text-orange-500 font-bold'>🎭 Género:</span> " . ucfirst(str_replace('_', ' ', $genero)) . "
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-7'>
                    <span class='text-orange-500 font-bold'>⭐ Calificación:</span> $calificacion / 10 
                    <span class='ml-2'>";
                    
                    // Mostrar estrellas según la calificación
                    for ($i = 0; $i < intval($calificacion); $i++) {
                        if ($i < 5) { // Máximo 5 estrellas visuales
                            echo "<span class='star' style='animation-delay: " . ($i * 0.1) . "s'>★</span>";
                        }
                    }
                    
                    echo "</span>
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-8'>
                    <span class='text-orange-500 font-bold'>📺 Episodios vistos:</span> $episodios_vistos
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-9'>
                    <span class='text-orange-500 font-bold'>👍 ¿Lo recomendarías?</span> " . ($recomendar === 'si' ? '✅ Sí' : '❌ No') . "
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-10'>
                    <span class='text-orange-500 font-bold'>📬 Newsletter:</span> $newsletter
                </div>
                
                <div class='data-item p-3 rounded fade-in fade-in-delay-10 bg-[#252525]'>
                    <span class='text-orange-500 font-bold block mb-2'>💭 Razón:</span>
                    <span class='text-gray-300 italic'>\"$razon\"</span>
                </div>
            </div>
            
            <a href='index.html' class='glow-btn block text-center mt-10 bg-orange-600 hover:bg-orange-700 text-black font-bold py-3 px-6 rounded-lg transition transform hover:scale-105'>
                ← Volver a la página principal
            </a>
        </div>

        <script>
            // Crear partículas flotantes
            const particlesContainer = document.getElementById('particles');
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 15 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particlesContainer.appendChild(particle);
            }

            // Crear confeti
            const colors = ['#ff9800', '#ff5722', '#ffc107', '#4caf50', '#2196f3', '#9c27b0'];
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 3 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                document.body.appendChild(confetti);
            }

            // Remover confeti después de 5 segundos
            setTimeout(() => {
                document.querySelectorAll('.confetti').forEach(c => c.remove());
            }, 5000);
        </script>
    </body>
    </html>";
} else {
    header("Location: index.html");
    exit;
}
?>