<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnee = "my_database";

$mysqli = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnee);
if ($mysqli->connect_error) {
    die("Erreur de connexion: " . $mysqli->connect_error);
}

if (isset($_POST['id_c'])) {
    $id_c = intval($_POST['id_c']); // Sécurisation de l'ID

    // Récupérer l'état actuel du candidat
    $requete = "SELECT etat FROM cand_span WHERE id_c = ?";
    $stmt = $mysqli->prepare($requete);
    $stmt->bind_param("i", $id_c);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $etat_actuel = $row['etat'];
    $stmt->close();

    // Basculer l'état (toggle)
    $nouvel_etat = ($etat_actuel == 1) ? 0 : 1;

    // Mettre à jour l'état
    $requete = "UPDATE cand_span SET etat = ? WHERE id_c = ?";
    $stmt = $mysqli->prepare($requete);
    $stmt->bind_param("ii", $nouvel_etat, $id_c);

    if ($stmt->execute()) {
        echo $nouvel_etat; // Retourner le nouvel état
    } else {
        die("Erreur lors de la mise à jour: " . $stmt->error);
    }

    $stmt->close();
    $mysqli->close();
} else {
    die("ID du candidat non reçu.");
}
?>