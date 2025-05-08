<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle offre d'emploi</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<style>
    body{
        background: linear-gradient(135deg, #2c3e50, #4ca1af);
        overflow-x: hidden;
    }
    h1{
        color: white;
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
    @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}
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
.btnn{
    display: inline-block;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
    background-color: maroon;
}
</style>
<body>
<nav class="navbar">
        <a href="acceuil_rh.php">Accueil</a>
        <a href="offre_emplois.php">Offres d'emploi</a>
        <a href="nouvelle_offre.php">Nouvelle offre d'emploi</a>
        <a href="cand_span.php">Candidatures spantannés</a>
    </nav><br><br><br>
    <h1>Nouvelle offre d'emplois</h1>
    <form action="nouvelle_offre_code.php" method="POST" id="form" >
        <label for="titre">Titre:
            <span class="required">*</span>
        </label>
        <input type="text" id="titre" name="titre" required><br>
        <label for="description">Description:
            <span class="required">*</span> 
        </label>
        <textarea id="description" name="description" rows="4" cols="50"  required></textarea><br>
        <label for="type">Type:
            <span class="required">*</span>
        </label>
        <select id="type" name="type" required>
            <option value="" >Selectionnez...</option>
            <option value="CDI" >CDI</option>
            <option value="CDD" >CDD</option>
            <option value="CAP" >CAP</option>
            <option value="CIVP">CIVP</option>
        </select><br>
        <label for="date">Date de publication:
            <span class="required">*</span>
        </label>
        <input type="date" id="date" name="date" required><br>
        <label for="date1">Date d'échéance:
            <span class="required">*</span>
        </label>
        <input type="date" id="date1" name="date1" required>
        <span id="text"></span><br>
            <div id="error-message" style="color: red; font-size: 0.9em; margin-top: 5px;"></div>
        <label for="auteur">Auteur:
            <span class="required">*</span>
        </label>
        <input type="text" id="auteur" name="auteur" required><br>
        <a href="succes1.php">
        <button type="submit">Ajouter</button></a><br><br>
        <button type="reset">Annuler</button><br><br>
        <a href="acceuil_rh.php">
    <button  onclick="window.location.href='acceuil_rh.php'" class="btnn">Retour</button>
</a>
    </form>
    <script>
document.getElementById("date","date1").addEventListener("input", function (e) {
    var date = document.getElementById("date").value;
    var date1 = document.getElementById("date1").value;
    var errorMessage = document.getElementById("error-message");
    if (date > date1 ) {
        errorMessage.innerHTML = ""; // Efface le message d'erreur si l'e-mail est valide
        errorMessage.style.color = "red";
    }
    if (date === date1 ) {
        errorMessage.innerHTML = ""; // Efface le message d'erreur si l'e-mail est valide
        errorMessage.style.color = "red";
    }
});

// Empêcher la soumission du formulaire si l'e-mail est invalide
document.querySelector("form").addEventListener("submit", function (e) {
    var date = document.getElementById("date").value;
    var date1 = document.getElementById("date1").value;
    if (date > date1) {
        e.preventDefault(); // Empêche la soumission du formulaire
        document.getElementById("error-message").innerHTML = "il faut que la date de écheance soit superieur a la date de publication";
        document.getElementById("error-message").style.color = "red";
    }
    if (date === date1 ) {
        e.preventDefault(); // Empêche la soumission du formulaire
        document.getElementById("error-message").innerHTML = "il faut que la date de écheance soit superieur a la date de publication";
        document.getElementById("error-message").style.color = "red";
    }
});
</script>
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
