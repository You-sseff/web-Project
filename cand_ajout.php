<!DOCTYPE html>
<html lang="fr">
    <style>
        h1{
            text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: brown;
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
</style>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire du condidats</title>
        <link rel="stylesheet" href="formulaire2.css">
    </head>
    <body>
    <div class="snowflakes-container" id="snowflakes-container"></div>
       <h1>
        <?php
        $serveur="localhost";
        $utilisateur="root";
        $mot_de_passe="";
        $base_de_donnee="my_database";        
        $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
        $id=$_GET['id'];
        $mysqli->set_charset("utf8");
        $requete="SELECT titre, echeance FROM rh WHERE id_rh = '$id'";
        $resultat=$mysqli->query($requete);
        $row = $resultat->fetch_assoc();
        echo  "<h1>" . $row["titre"] . "</h1>" ;
        $actuelle = date("Y-m-d");
        $date1=$row["echeance"];
        if($actuelle>$date1){
            header("Location:Erreur.php");
        }else if($id!=$_GET["id"]){
            header("Location:Erreur.php");
        }
        ?>
        </h1>
        <form  action="cand_ajout_code.php"  method="POST" enctype="multipart/form-data" id="formulaire">    
            <input type="hidden" id="id" name="id" value="<?php echo $id ; ?>"><br><br>
            <label for="nom"></label>Nom:
            <span class="required">*</span> 
            <input type="text" id="nom" name="nom" placeholder="Nom du famille" required>
            <label for="prenom"></label>Prenom:
            <span class="required">*</span>
            <input type="text" id="prenom" name="prenom" required>
            <label for="D"></label>Date naissance:
            <span class="required">*</span>
            <input type="date" id="D" name="D" required>
            <label for="tel"></label>Telephone:
            <span class="required">*</span>
            <input type="text" id="tel" name="tel" placeholder="+21692606081" required><br><br>
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
           <a href="liste_offre_emplois.php">
    <button onclick="window.location.href='liste_offre_emplois.php'" class="btnn">Retour</button>
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