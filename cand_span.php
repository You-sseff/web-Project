<!DOCTYPE html>
<html lang="fr">
<style>
    body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
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
    h1{
        color: white;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
    }strong{
        color: blue;
        font-family: 'Courier New', Courier, monospace;
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
        table.dataTable {
            width: 20%;
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
    <head>
        <meta charset="UTF-8">
        <title>Liste des candidats</title>
        <link rel="stylesheet" href="offre_emplois.css">
        <link href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar">
        <a href="acceuil_rh.php">Accueil</a>
        <a href="offre_emplois.php">Offres d'emploi</a>
        <a href="nouvelle_offre.php">Nouvelle offre d'emploi</a>
        <a href="cand_span.php">Candidatures spantannés</a>
    </nav><br><br><br><br>
        <h3>Nombre de candidats:
            <?php
                $serveur="localhost";
                $utilisateur="root";
                $mot_de_passe="";
                $base_de_donnee="my_database";        
                $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
                $mysqli->set_charset("utf8");
                $requete_row = "SELECT id_c FROM cand_span LIMIT 1"; // Example query to get an id_c
                $resultat = $mysqli->query($requete_row);
                while ($row = $resultat->fetch_assoc()){
                    $nbr = 0;
                    $requete_cand = "SELECT count(*) AS total FROM cand_span";
                    $resultat_cand = $mysqli->query($requete_cand);
    
                if ($resultat_cand) {
                $data = $resultat_cand->fetch_assoc();
                $nbr = $data['total'];
                echo "<h3>" . $nbr . "</h3>";
                } else {
                    echo "Error: " . $mysqli->error;
                        }
                }
                ?>
                <h3>
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

        <table  id="example" class="table table-striped" width="50%">
            <thead>
                <tr><th>Nom</th>
                <th id="pr">Prenom</th>
                <th nowrap>Poste</th>
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
                $id1=["id1"];
                $mysqli->set_charset("utf8");
                $requete = "SELECT *FROM cand_span ORDER BY date_conff DESC ";
                $resultat=$mysqli->query($requete);
                $chemin_fichier="/uploads1/candidatures_span/";
                while($row=$resultat->fetch_assoc()){
                    $rowClass = ($row["etat"] == 1) ? "class='checked'" : "";
                    $etatBouton = ($row["etat"] == 1) ? "Confirmé ✅" : "Confirmer";
                    $couleurBouton = ($row["etat"] == 1) ? "style='background-color: green; color: white;'" : "";
                    echo "<tr>";
                    echo "<td $rowClass >" . $row["nom"]. "</td>";
                    echo "<td id='pr'>" . $row["prenom"]. "</td>";
                    echo "<td id='ps' nowrap>" . $row["poste"]. "</td>";
                    echo "<td id='dn'>" . $row["date_nais"]. "</td>";
                    echo "<td>" . $row["tell"]. "</td>";
                    echo "<td>" . $row["email"]. "</td>";
                    echo "<td><a href='". $row['cv'] ."' target=_blank ><button class='voir-cv'>Voir CV</button></td>";
                    echo "<td id='dc'>" . $row["date_conff"]. "</td>";
                    echo "<td nozrqp><button class='confirmer-btn' data-id='" . $row['id_c'] . "' $couleurBouton >$etatBouton</button></td>";
                    echo "</tr>";
                }
            
?>
            </tbody>
            </div>
            </table>
            <div class="button-container">
                
            </div>
          <script>
    $(document).ready(function () {
    $(".confirmer-btn").click(function () {
        var button = $(this);
        var idCandidat = button.data("id");

        $.ajax({
            url: "conf1.php",
            type: "POST",
            data: { id_c: idCandidat },
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
