<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succès</title>
    <style>
        @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Bouton animé */

.falling-item {
    position: absolute;
    top: -100px;
    width: 50px;
    height: auto;
    animation: fall linear infinite;
    z-index: -1;
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
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
        .btn-form {
            background-color: #4caf50;
        }
        .btn-form:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✔️</div>
        <div class="success-message">Formulaire envoyé avec succès !</div>
        <div class="success-description">
            Merci pour votre soumission. Nous avons bien reçu vos informations.
        </div>
        <a href="offre_emplois.php" class="btn-home">Retour à la page précédente</a>
        <a href="nouvelle_offre.php" class="btn-form">Soumettre un autre formulaire</a>
    </div>
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
