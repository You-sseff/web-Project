<?php
//pour afficher les erreur sur ecran s'il y en a
error_reporting(E_ALL ^ E_DEPRECATED);

// Connexion au serveur mysql
$connect = mysql_connect("localhost", "root","") or die('Impossible de se connecter : ' . mysql_error());

// selection de la base de donnees
mysql_select_db("my_database", $connect);

//choisir encodage des caracteres
mysql_set_charset('utf8',$connect);

//choisir definir les fuseaux horaires a utiliser
date_default_timezone_set("Africa/Tunis");
setlocale(LC_TIME, 'fr_FR', 'french', 'fre', 'fra');

?>