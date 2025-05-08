<?php
//inclure le fichier de connexion a la base
include('connect.php');

//récupérer les données du formulaire

$titre = $_POST['titre'];$titre = mysql_real_escape_string(trim($titre));
$description = $_POST['description'];$description = mysql_real_escape_string(trim($description));
$type = $_POST['type'];$type = mysql_real_escape_string(trim($type));
$date = $_POST['date'];$date = mysql_real_escape_string(trim($date));
$date1= $_POST['date1'];$date1 = mysql_real_escape_string(trim($date1));
$auteur= $_POST['auteur'];$auteur = mysql_real_escape_string(trim($auteur));
					//requete pour inserer dans la base mysql
					$sql = "INSERT INTO rh (titre, description, type, publication, echeance, auteur) VALUES ('$titre', '$description', '$type',  '$date','$date1','$auteur')";
					$res = mysql_query($sql);
					if ($res) {
					echo 'Insertion reussie';		
					}
					else 
					{
					//afficher l'erreur si elle existe
					die(mysql_error());}
					//rediriger vers l'interface d'ajout
					header("location:succes1.php");
                    exit();
?>