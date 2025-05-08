<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>Liste des candidats</title>
        <link href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" rel="stylesheet">
    </head>
    <style>
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
        
        .ret {
    display: block;
    margin: 20px auto; /* Centre le bouton */
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: white;
    background-color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
ret:hover {
    background-color: black;
}

strong{
    text-align: center;
    color: blue;
    font-family: 'Courier New', Courier, monospace;
}
    h3{
        color: black;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
    }strong{
        color: blue;
        font-family: 'Courier New', Courier, monospace;
    }
    h1{
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: white;
    }
        .btnn {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Empêche le défilement horizontal */
        }
        table.dataTable {
            border-collapse: collapse;
            background-color: black;
            border-radius: 8px;
            overflow: hidden;
        }

        table.dataTable thead {
            background-color:rgb(28, 114, 201);
            color: #ffffff;
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color:black /* Alternance des lignes */
        }

        table.dataTable tbody tr:nth-child(odd) {
            background-color:black;
        }

        table.dataTable tbody tr:hover {
            background-color:black; /* Couleur au survol */
        }

        table.dataTable tbody td {
            padding: 10px;
        }

        table.dataTable tfoot {
            background-color: #007bff;
            color:black;
        }
        .voir-cv {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        #pr,#dn,#dc {
            text-align: left;
        }
         td {
            border: 1px solid white; /* Crée les lignes horizontales et verticales */
            padding: 10px;
            text-align: left;
        }
    .row.checked {
      background-color: lightgreen;
    }

        </style>
    <body>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
        <script>
        $(document).ready(function() {
    $('#example').DataTable({
        order: [[1, '']], // Tri par la 4ème colonne (index 3) en ordre décroissant
        columnDefs: [
            { type: 'num', targets: 1 } // Définit la 4ème colonne comme numérique
        ]
    });
});
        </script>
        <header>
            <h1>
        <?php
        $serveur="localhost";
        $utilisateur="root";
        $mot_de_passe="";
        $base_de_donnee="my_database";        
        $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
        $id=$_GET['id'];
        $mysqli->set_charset("utf8");
        $requete="SELECT titre FROM rh WHERE id_rh = '$id'";
        $resultat=$mysqli->query($requete);
        $row = $resultat->fetch_assoc();
        echo  "<h1>" . $row["titre"] . "</h1>" ;
        ?>
        </h1>
        <h3>Liste des Candidats</h3>
        </header>
<script>
    document.body.style.zoom = "100%"; // Réduit le zoom à 90%
</script>
        <table  id="example" class="table table-striped" width="80%">
            <thead>
                <tr><th>Nom</th>
                <th id="pr">Prenom</th>
                <th id="dn">Date de naissance</th>
                <th>Téléphone</th>
                <th>E-mail</th>
                <th nowrap>CV</th>
                <th nowrap id="dc">Date de confirmation</th>
                <th>Etat</th>
                </tr>
            </thead>
            <div class="row">
            <tbody>
                <?php
                $serveur="localhost";
                $utilisateur="root";
                $mot_de_passe="";
                $base_de_donnee="my_database";        
                $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
                $mysqli->set_charset("utf8");
                $requete="SELECT * FROM candidat WHERE id_rh = '$id' order by date_conf DESC";
                $resultat=$mysqli->query($requete);
                $chemin_fichier="/uploads/candidature/;";
                while($row=$resultat->fetch_assoc()){
                    $rowClass = ($row["etat"] == 1) ? "class='checked'" : "";
                    $etatBouton = ($row["etat"] == 1) ? "Confirmé ✅" : "Confirmer";
                    $couleurBouton = ($row["etat"] == 1) ? "style='background-color: green; color: white;'" : "";
                    echo "<tr>";
                    echo "<td $rowClass>" . $row["nom"]. "</td>";
                    echo "<td id='pr'>" . $row["prenom"]. "</td>";
                    echo "<td id='dn'>" . $row["date_naiss"]. "</td>";
                    echo "<td>" . $row["telephone"]. "</td>";
                    echo "<td>" . $row["email"]. "</td>";
                    echo "<td><a href='". $row['cv'] ."' target=_blank ><button class='voir-cv' data-id='$id'>Voir CV</button></td>";
                    echo "<td id='dc'>" . $row["date_conf"]. "</td>";
                    echo "<td><button class='confirmer-btn' data-id='" . $row['id_cand'] . "' $couleurBouton>$etatBouton</button></td>";
                    echo "</tr>";
                }
            
?>
            </tbody>
            </div>
            </table>
            <div class="button-container">
            <a href="offre_emplois.php">
            <button class="ret" type="submit">retour</button></a></div>
          <script>
    $(document).ready(function () {
    $(".confirmer-btn").click(function () {
        var button = $(this);
        var idCandidat = button.data("id");

        $.ajax({
            url: "conf.php",
            type: "POST",
            data: { id_cand: idCandidat },
            success: function (response) {
                console.log("Nouvel état:", response); // Vérification du nouvel état retourné

                if (response.trim() == "1") {
                    button.text("Confirmé ✅");
                    button.css("background-color", "green").css("color", "white");
                    button.closest("tr").addClass("checked"); // Ajouter couleur verte à la ligne
                } else {
                    button.text("Confirmer");
                    button.css("background-color", "").css("color", "");
                    button.closest("tr").removeClass("checked"); // Supprimer la couleur verte
                }
            },
            error: function (xhr, status, error) {
                console.error("Erreur AJAX:", error);
            }
        });
    });
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
