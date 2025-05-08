<!DOCTYPE html>
<html lang="fr">
    <style>
        @media (max-width: 767px) {
    body {
        font-size: 14px;
        padding: 10px;
        overflow: hidden;
    }
}
    form {
    top: auto;
    width: 400px; /* Largeur fixe de 400px */
    margin: -10px auto; /* Centre le formulaire horizontalement */
    padding: 20px;
    background-color: #000; /* Fond noir pour le formulaire */
    border: 1px solid white; /* Bordure blanche pour bien contraster avec le fond noir */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre douce autour du formulaire */
    z-index: 2;
}
input[type="text"], input[type="date"], input[type="email"], textarea, select {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid white; /* Bordure blanche pour les champs */
    border-radius: 4px;
    font-size: 14px;
    background-color: #333; /* Fond des champs en gris sombre */
    color: white; /* Texte des champs en blanc */
    box-sizing: border-box;
}

button[type="submit"], input[type="submit"] {
    background-color: #4CAF50; /* Vert pour les boutons de soumission */
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
}

button[type="submit"]:hover, input[type="submit"]:hover {
    background-color: #45a049; /* Changement de couleur au survol */
}

.error {
    color: red; /* Texte d'erreur en rouge */
    font-size: 14px;
    margin-top: 5px;
}

.form-group {
    margin-bottom: 15px;
}

input[type="text"]:focus, input[type="date"]:focus, input[type="email"]:focus, textarea:focus, select:focus {
    border-color: #4CAF50; /* Bordure verte au focus */
    outline: none;
    box-shadow: 0 0 5px rgba(0, 128, 0, 0.2);
}
body {
    overflow-x: ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
    overflow-x: hidden;
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
}
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
label {
    text-align: left;
    font-size: 16px;
    margin-bottom: 8px;
    display: block;
    color: white; /* Texte des labels en blanc */
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


<head>
    <meta charset="UTF-8">
    <title>Modifier l'offre d'emploi</title>
</head>
    <body>
        <header>
            <h1>Modifier l'offre d'emploi </h1>
        </header>
    <?php
             $serveur="localhost";
             $utilisateur="root";
             $mot_de_passe="";
             $base_de_donnee="my_database";  
             $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
             $id= $_GET["id"];
             $mysqli->set_charset("utf8");
             $requete="SELECT * FROM rh where id_rh='$id'";
             $resultat=$mysqli->query($requete);
             $row=$resultat->fetch_assoc();
            $id=$row["id_rh"];
            $titre=$row["titre"];
            $description=$row["description"];
            $type=$row["type"];
            $date=$row["publication"];
            $date1=$row["echeance"];
            $auteur=$row["auteur"];
            ?>
    <form action="modifier.php" method="POST">

        <input type="hidden" id="id" name="id" value="<?php echo $id ; ?>" required><br>
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" value="<?php echo $titre ; ?>" required><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required><?php echo $description ; ?></textarea><br>
        <label for="type">Type:</label>
        <select id="type" name="type"><?php echo $type ;?>
            <option value="Selectionnez">Selectionnez...</option>
            <option value="CDI" <?php if ($type == 'CDI') echo 'selected'; ?>>CDI</option>
            <option value="CDD" <?php if ($type == 'CDD') echo 'selected'; ?>>CDD</option>
            <option value="CAP" <?php if ($type == 'CAP') echo 'selected'; ?>>CAP</option>
            <option value="CIVIS" <?php if ($type == 'CIVIP') echo 'selected'; ?>>CIVIS</option>
        </select><br>
        <label for="date=">Date de publication</label>
        <input type="date" id="date" name="date"required  value="<?php echo $date ;?>"><br>
        <label for="date1">Date d'échéance:</label>
        <input type="date" id="date1" name="date1" value="<?php echo $date1 ;?>" required ><br>
        <span id="text"></span>
            <div id="error-message" style="color: red; font-size: 0.9em; margin-top: 5px;"></div>
        <label for="auteur">Auteur:</label>
        <input type="text" id="auteur" name="auteur" value="<?php echo $auteur ;?>"required><br><br>
        <a href="success2.php">
        <button type="submit">Sauvegarder</button></a><br><br>
        <a href="offre_emplois.php">
    <button type="button" onclick="window.location.href='offre_emplois.php'" class="btnn">Retour</button>
</a>
    </form>
    <script>
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