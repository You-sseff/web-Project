<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            background: radial-gradient(circle, #0f2027, #203a43, #2c5364);
            background-size: cover; /* Ajuste l'image pour couvrir toute la page */
            background-position: center; /* Centre l'image */
            background-repeat: no-repeat; /* Empêche la répétition */
            height: 100vh; /* Prend toute la hauteur de l'écran */
            overflow: hidden;
            position: relative; /* Nécessaire pour positionner les flocons de neige */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Style de la barre de navigation */
        .navbar {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
            background: rgba(255, 255, 255, 0.1);
            padding: 14px 30px;
            border-radius: 50px;
            backdrop-filter: blur(15px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }
        
        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
            font-weight: 600;
        }
        
        .navbar a:hover {
            color: #ffcc00;
            transform: scale(1.1);
        }
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 60px;
            font-weight: 700;
            animation: fadeIn 2s ease-in-out;
        }

        .hero p {
            font-size: 22px;
            margin-bottom: 20px;
            animation: fadeIn 3s ease-in-out;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 20px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
            animation: fadeIn 4s ease-in-out;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Style de la neige */
        .snowflake {
            position: absolute;
            top: -10px;
            width: 10px;
            height: 10px;
            background-color: #fff;
            border-radius: 50%;
            animation: snow 10s linear infinite;
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
            z-index: 0; /* Assure que la neige est derrière tout le contenu */
        }
    </style>
</head>
<body>

    <!-- Barre de navigation -->
    <nav class="navbar">
        <a href="acceuil_cand.php">Accueil</a>
        <a href="liste_offre_emplois.php">Liste d'offre d'emplois</a>
        <a href="candidatures_span.php">Candidature spontanée</a>
    </nav>

    <!-- Neige (flocons de neige animés) -->
    <div class="snowflakes-container" id="snowflakes-container"></div>

    <!-- Section d'accueil -->
    <div class="hero">
        <div>
            <h1>Bienvenue sur notre site de recrutement</h1>
            <p>Découvrez nos services et notre expertise.</p>
            <a href="liste_offre_emplois.php" class="btn">Découvrez nos offres d'emploi</a>
        </div>
    </div>

    <script>
        // Fonction pour créer des flocons de neige
        function createSnowflakes() {
            const snowflakeCount = 100; // Nombre de flocons
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
