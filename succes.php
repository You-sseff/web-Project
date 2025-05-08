<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succès</title>
    <style>
        body {
            background: radial-gradient(circle, #0f2027, #203a43, #2c5364);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f9f9;
            color: #333;
            overflow: hidden;
        }
        .success-container {
            text-align: center;
            padding: 20px;
            background: black;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }
        .success-icon {
            font-size: 5rem;
            color: #4caf50;
        }
        .success-message {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            margin: 10px 0;
        }
        .success-description {
            font-size: 1rem;
            color: white;
            margin-bottom: 20px;
        }
        .btn-home, .btn-form {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-home {
            background-color: #007bff;
        }
        .btn-home:hover {
            background-color: #0056b3;
        }
        .snowflake {
            position: absolute;
            top: -10px;
            width: 10px;
            height: 10px;
            background-color: #fff;
            border-radius: 50%;
            animation: snow 10s linear infinite;
            z-index: -1;
        }

        @keyframes snow {
            0% {
                transform: translateY(-10px);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        /* Générer des flocons aléatoirement */
        .snowflakes-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; /* Permet de cliquer sur les éléments au-dessus */
            z-index: -1; /* Assure que la neige est derrière tout le contenu */
        }
    </style>
</head>
<body>
<div class="snowflakes-container" id="snowflakes-container"></div>
    <div class="success-container">
        <div class="success-icon">✔️</div>
        <div class="success-message">Candidature envoyé avec succès !</div>
        <div class="success-description">
            Merci pour votre soumission. Nous avons bien reçu vos informations.
        </div>
        <a href="liste_offre_emplois.php" class="btn-home">Retour à la page précédente</a>
    </div>
    <script>
        // Fonction pour créer des flocons de neige
        function createSnowflakes() {
            const snowflakeCount =200; // Nombre de flocons
            const container = document.getElementById('snowflakes-container');
            for (let i = 0; i < snowflakeCount; i++) {
                const snowflake = document.createElement('div');
                snowflake.classList.add('snowflake');
                // Position aléatoire pour chaque flocon
                snowflake.style.left = `${Math.random() * 100}vw`;
                snowflake.style.animationDuration = `${Math.random() * 5 + 5}s`; // Durée aléatoire de la chute
                snowflake.style.animationDelay = `${Math.random() * 5}s`; // Délai aléatoire
                container.appendChild(snowflake);
            }
        }

        // Créer les flocons de neige au chargement
        window.onload = createSnowflakes;
    </script>
</body>
</html>

