<!DOCTYPE html>
<html lang="fr">
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
/* Sur téléphone, une seule colonne */
@media (max-width: 768px) {
    .container {
        grid-template-columns: 1fr;
    }
}
        .btn {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn_modif {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .btn_modif:hover {
            background-color: #45a049; 
        }


        .btn_suppr {
            background-color: #f44336; 
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .btn_suppr:hover {
            background-color: #e53935; 
        }
        .btn_details {
            background-color: #2196F3; 
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .btn_details:hover {
            background-color: #1976D2; 
        }

        .btn + .btn {
            margin-left: 10px;
        }
        .btn_cand{
            background-color:maroon; 
            color: white;
            font-weight: bold;
            cursor: pointer;
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
        
       #de,#dp,#nb,#des {
            text-align: left;
        }
        td {
            border:  1px solid mediumpurple;
            padding: 10px;
            text-align: left;
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
#desc{
    text-align: left;
    overflow-wrap: break-word;
    word-wrap: break-word;
    hyphens: auto;
    max-width: 100%;
    box-sizing: border-box;
        }
  
    </style>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>Offres d'emplois</title>
        <link href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" rel="stylesheet">
        </head>
    <body>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
        <script>
        $(document).ready(function() {
    $('#example').DataTable({
        order: [[1, '']],
        columnDefs: [
            { type: 'num', targets: 1 }
        ]
    });
});
        </script>
        <div class="navbar">
            <a href="acceuil_rh.php">Accueil</a>&nbsp;&nbsp;
            <a href="offre_emplois.php">Offres d'emplois</a>&nbsp;&nbsp;
            <a href="nouvelle_offre.php">Nouvelle offre d'emplois</a>
            <a href="cand_span.php">Candidatures spantannés</a>
        </div><br><br><br><br>
        <script>
    $(document).ready(function() {
        $('#example').DataTable();
        rows.forEach(row => table.appendChild(row));

    });
</script>
        <table id="example" class="table table-striped" width="80%">
            <thead>
                <tr>
                <th nowrap>Titre</th>
                <th id="des" >Description</th>
                <th>Type</th>
                <th>Date de publication</th>
                <th id="de">Date de échéance</th>
                <th>Auteur</th>
                <th id="nb">Nombre de candidats</th>
                <th nowrap>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $serveur="localhost";
                $utilisateur="root";
                $mot_de_passe="";
                $base_de_donnee="my_database";        
                $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
                $mysqli->set_charset("utf8");
                $order = "DESC"; // Tri par date décroissante (les plus récentes en premier)
                if (isset($_GET['order']) && $_GET['order'] === 'asc') {
                    $order = "ASC"; // Tri par date croissante (les plus anciennes en premier)
                }$requete="SELECT * FROM rh ORDER BY publication $order";
                $resultat = $mysqli->query($requete);
                while($row=$resultat->fetch_assoc()){
                    $nbr = 0;
                    $requete_cand = "SELECT count(*) AS total FROM candidat WHERE id_rh = {$row['id_rh']}";
                    $resultat_cand = $mysqli->query($requete_cand);
                    
                    if ($resultat_cand) {
                        $data = $resultat_cand->fetch_assoc();
                        $nbr = $data['total'];
                    } else {
                        echo "Error: " . $mysqli->error;
                    }
                    echo "<tr>";
                    echo "<td nowrap>" . $row["titre"]. "</td>";
                    echo "<td id='desc' >" . $row["description"]. "</td>";
                    echo "<td>" . $row["type"]. "</td>";
                    echo "<td id='dp'>" . $row["publication"]. "</td>";
                    echo "<td id='de'>" . $row["echeance"]. "</td>";
                    echo "<td>" . $row["auteur"]."</td>";
                    echo "<td id='nb'>" . $nbr. "</td>";
                    echo "<td nowrap>
                    <a href='candidats.php?id=" . $row['id_rh'] . "'>
                    <button class='btn_cand'>C</button></a>
                    <a href='modif.php?id=" . $row['id_rh'] . "'>
                    <button class='btn_modif'>M</button></a>
                    <a href='det.php?id=" .$row['id_rh']."'>
                    <button class='btn_details'>D</button></a>
                    <button class='btn_suppr' data-id='" .$row['id_rh']. "'>
                    S</a></button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <script type="text/javascript">
    document.addEventListener("click", function(e) {
        if (e.target && e.target.classList.contains('btn_suppr')) {
            var id_rh = e.target.getAttribute('data-id');
            if (confirm("Voulez-vous vraiment supprimer cette offre d'emploi ?")) {
                window.location.href = "supprimer.php?id_rh=" + id_rh ;
            }
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
</htm>