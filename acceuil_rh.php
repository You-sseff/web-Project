<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil RH</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
        }

        /* Navbar */
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
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 10;
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

        /* Animation du texte */
        .hero h1 {
            font-size: 60px;
            font-weight: 700;
            animation: fadeIn 2s ease-in-out;
        }

        .hero h3 {
            font-size: 28px;
            font-weight: 500;
            animation: fadeIn 3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Bouton animé */
        .btn {
            display: inline-block;
            padding: 14px 30px;
            font-size: 20px;
            font-weight: 600;
            color: white;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.3);
            animation: fadeIn 4s ease-in-out;
        }

        .btn:hover {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            transform: translateY(-3px);
            box-shadow: 0px 10px 20px rgba(0,0,0,0.4);
        }

        /* Animation des objets (contrats et stylos) qui tombent */
        .falling-item {
            position: absolute;
            top: -100px;
            width: 50px;
            height: auto;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="acceuil_rh.php">Accueil</a>
        <a href="offre_emplois.php">Offres d'emploi</a>
        <a href="nouvelle_offre.php">Nouvelle offre d'emploi</a>
        <a href="cand_span.php">Candidatures spantannées</a>
    </nav>

    <div class="hero">
        <h1>Bienvenue</h1>
        <h3>Espace RH</h3><br>
    </div>

    <button class="btn" onclick="window.location.href='offre_emplois.php';">Voir les offres</button>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const images = [
                "rhh.png",  // Image de contrat
                "rh.png"     // Image de stylo
            ];

            function createFallingItem() {
                let item = document.createElement("img");
                item.src = images[Math.floor(Math.random() * images.length)]; // Choix aléatoire
                item.classList.add("falling-item");
                item.style.left = Math.random() * window.innerWidth + "px"; // Position aléatoire
                item.style.animationDuration = (Math.random() * 5 + 5) + "s"; // Vitesse aléatoire

                document.body.appendChild(item);

                // Supprime l'élément après la chute
                setTimeout(() => {
                    item.remove();
                }, 10000);
            }

            // Génère plusieurs objets toutes les 500 ms
            setInterval(createFallingItem, 500);
        });
    </script>

</body>
</html>
