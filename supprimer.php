<?php
$serveur="localhost";
$utilisateur="root";
$mot_de_passe="";
$base_de_donnee="my_database";        
$mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
if (!empty($_GET['id_rh']) ) {
    $id_rh = $_GET['id_rh'];
    $requete= "DELETE FROM rh WHERE id_rh=$id_rh";
    if ($mysqli->query($requete) ){
        header("location:offre_emplois.php");
    }
}
?>