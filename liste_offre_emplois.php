<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Les offres d'emplois</title>
        <link rel="stylesheet" href="liste.css">
        <link href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" rel="stylesheet">
    </head>

<body>
<div class="snowflakes-container" id="snowflakes-container"></div>
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
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
    <div class="navbar">
        <a href="acceuil_cand.php">Accueil</a>
        <a href="liste_offre_emplois.php">Liste d'offres d'emplois</a>
        <a href="candidatures_span.php">candidatures spantanées</a>
    </div><br><br><br><br>
    <table id="example" class="table table-striped table-bordered" style="width:80%">
        <thead>
            <tr><th>Titre</th>
            <th id="des">Description</th>
            <th>Type</th>
            <th id="da">Date de échéance</th>
            <th>Action</th></tr>
        </thead>
        <tbody>
            <?php
             $serveur="localhost";
             $utilisateur="root";
             $mot_de_passe="";
             $base_de_donnee="my_database";   
             $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
             $mysqli->set_charset("utf8");
             $requete="SELECT * FROM rh ORDER BY echeance DESC";
             $resultat=$mysqli->query($requete);
             while($row=$resultat->fetch_assoc()){
                $dateEcheance = new DateTime($row["echeance"]);
                $dateActuelle = new DateTime(); // Date actuelle      
                 echo "<tr>";
                 echo "<td>" . $row["titre"]."</td>";
                 echo "<td id='des'>" . $row["description"]."</td>";
                 echo "<td>" . $row["type"]."</td>";
                 echo "<td id='date1'>" . $row["echeance"]."</td>";
                 if ($dateEcheance < $dateActuelle) {
                    // Offre expirée : désactiver le bouton ou afficher un message
                    echo "<td nowrap><a href='cand_ajout.php?id=" . $row['id_rh'] . "'><button id='btn_postuler' disabled>Offre expirée</button></td>";
                } else {
                    // Offre valide : afficher le bouton "Postuler"
                    echo "<td nowrap><a href='cand_ajout.php?id=" . $row['id_rh'] . "'><button id='btn_postuler'>Postuler</button></a></td>";
                }
                 echo "</tr>";
            }
            ?>
        </tbody>
    </table>
             <script>
        document.getElementById('btn_postuler').addEventListener('click', function () {
            console.log('Bouton cliqué !');
        });
        </script>
         <script>
        function createSnowflakes() {
            const snowflakeCount = 200; 
            const container = document.getElementById('snowflakes-container');
            for (let i = 0; i < snowflakeCount; i++) {
                const snowflake = document.createElement('div');
                snowflake.classList.add('snowflake');
                snowflake.style.left = `${Math.random() * 100}vw`;
                snowflake.style.animationDuration = `${Math.random() * 5 + 5}s`;
                snowflake.style.animationDelay = `${Math.random() * 5}s`; 
                container.appendChild(snowflake);
            }
        }
        window.onload = createSnowflakes;
    </script>
    </body>
</html>