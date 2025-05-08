<!DOCTYPE html>
<html lang="fr">
    <style>
body {
    height: 120vh;
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
h1{
    color: white;
}
p{
    color: white;
}
strong{
    color: blue;
    font-family: 'Courier New', Courier, monospace;

}
        button {
    background-color: maroon;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
        }
        #printButton {
        background-color:blue;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
        }

        #printButton:hover {
            background-color: #0056b3;
        }

        /* Style pour la section à imprimer */
        .printable-area {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px 0;
        }
    </style>


<head>

    <meta charset="UTF-8">
    <title>Details de l'offre d'emploi</title>
    <link rel="stylesheet" href="formulaire.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css" rel="stylesheet">
</head>
    <body>
        <header>
            <h1>Détails de l'offre d'emploi</h1><br>
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
    <body>
   <form action="offre_emplois.php" method="POST">
    <strong><label for="titre">Titre:</label></strong>
    <p><?php echo($titre); ?></p><br>
    <strong><label for="description">Description:</label></strong>
    <p><?php echo($description); ?></p><br>
    <strong><label for="type">Type:</label></strong>
    <p><?php echo($type); ?></p><br>
    <strong><label for="date=">Date de publication</label></strong>
    <p><?php echo($date); ?></p><br>
    <strong><label for="date1">Date d'échéance:</label></strong>
    <p><?php echo($date1); ?></p><br>
    <strong><label for="auteur">Auteur:</label></strong>
    <p><?php echo($auteur); ?></p><br>
    <a href="offre_emplois.php">
    <button >Retour</button></a><br><br>
    <button id="printButton">Impression</button>
    </form>
    <script>
        document.getElementById("printButton").addEventListener("click", function() {
            window.print();
        });
    </script>
</body>
</html>