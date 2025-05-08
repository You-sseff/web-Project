<!DOCTYPE html>
<html lang="fr">
    <style>
        h1{
            text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: white;
    }
        .required {
            color: red;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            display: none; /* Le message est masqué par défaut */
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
    background-color: darkcyan;
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
</style>
    <head>
        <meta charset="UTF-8">
        <title>candidatures spantanées</title>
        <link rel="stylesheet" href="formulaire2.css">
    </head>
    <body>
        <h1>Formulaire du candidats</h1>
    <div class="snowflakes-container" id="snowflakes-container"></div>
        <header>
    </header>
       <h1>
        <?php
        $serveur="localhost";
        $utilisateur="root";
        $mot_de_passe="";
        $base_de_donnee="my_database";        
        $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
        $mysqli->set_charset("utf8");
        $actuelle = date("Y-m-d");
        ?>
        </h1>
        <form  action="Candidatures_span_code.php"  method="POST" id="formulaire" enctype="multipart/form-data">    
            <input type="hidden" id="id_c" name="id_c" value="<?php echo $id_c ; ?>">
            <label for="nom"></label>Nom:
            <span class="required">*</span> 
            <input type="text" id="nom" name="nom" placeholder="Nom du famille" required>
            <label for="prenom"></label>Prenom:
            <span class="required">*</span>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="tr">Les postes disponibles
            <span class="required">*</span>
        </label>
        <select  name="poste" required>
        <option value="">selectionnez...</option>
        <option>Agent de Réception</option>
        <option>Assistant Administratif</option>
        <option>Chef Cuisinier</option>
        <option>Chef de Projet</option>
        <option>Comptable</option>
        <option>Concierge</option>
        <option>Designer Graphique</option>
        <option>Développeur Web</option>
        <option>Directeur d'Hôtel</option>
        <option>Directeur Financier</option>
        <option>Directeur Général</option>
        <option>Directeur Marketing</option>
        <option>Directeur des Ressources Humaines</option>
        <option>Femme/Valet de Chambre</option>
        <option>Gouvernante</option>
        <option>Manager de Restauration</option>
        <option>Réceptionniste</option>
        <option>Responsable Commercial</option>
        <option>Responsable de la Sécurité</option>
        <option>Responsable des Réservations</option>
        <option>Responsable Logistique</option>
        <option>Serveur/Serveuse</option>
        <option>Sommelier</option>
        <option>Technicien Support Informatique</option>
    </select>
        </select><br>
            <label for="D"></label>Date naissance:
            <span class="required">*</span>
            <input type="date" id="D" name="D" required>
            <label for="tel"></label>Telephone:
            <span class="required">*</span>
            <input type="text" id="tel" name="tel" placeholder="+21692606081" required><br>
            <label for="email"></label>E-Mail:
            <span class="required">*</span>
            <input type="text" id="email" name="email" placeholder="exemple@gmail.com" required>
            <span id="text"></span>
            <div id="error-message" style="color: red; font-size: 0.9em; margin-top: 5px;"></div><br>
            <label for="cv"></label>CV:
            <span class="required">*</span>
            <input type="file" id="cv" name="cv"  accept=".pdf,.docx" required><br><br>
            <input type="submit" name="confirmer" value="Envoyer" onclick="sendEmail()"><br><br>
           <button input type="reset">Annuler</button><br><br>
           <a href="acceuil_cand.php">
    <button onclick="window.location.href='acceuil_cand.php'" class="btnn">Retour</button>
</a>
            
        </form>
<script>
document.getElementById("email").addEventListener("input", function (e) {
    var email = document.getElementById("email").value;
    var errorMessage = document.getElementById("error-message");
    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (email.match(pattern)) {
        errorMessage.innerHTML = ""; // Efface le message d'erreur si l'e-mail est valide
        errorMessage.style.color = "green";
    }
    if (email === "") {
        errorMessage.innerHTML = ""; // Efface le message d'erreur si le champ est vide
    }
});

// Empêcher la soumission du formulaire si l'e-mail est invalide
document.querySelector("form").addEventListener("submit", function (e) {
    var email = document.getElementById("email").value;
    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!email.match(pattern)) {
        e.preventDefault(); // Empêche la soumission du formulaire
        document.getElementById("error-message").innerHTML = "Veuillez entrer une adresse e-mail valide.";
        document.getElementById("error-message").style.color = "red";
    }
});
</script>
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