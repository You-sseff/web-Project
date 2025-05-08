<?php 
include('connect.php');
$id = $_POST['id'];$id = mysql_real_escape_string(trim($id));
$titre = $_POST['titre'];$titre = mysql_real_escape_string($titre);
$description = $_POST['description'];$description = mysql_real_escape_string(trim($description));
$type = $_POST['type'];$type = mysql_real_escape_string(trim($type));
$date = $_POST['date'];$date = mysql_real_escape_string(trim($date));
$date1= $_POST['date1'];$date1 = mysql_real_escape_string(trim($date1));
$auteur = $_POST['auteur'];$auteur = mysql_real_escape_string(trim($auteur));
//modifier 
$req = " UPDATE rh SET titre='$titre', description='$description', type='$type', publication='$date' , echeance='$date1', auteur='$auteur' WHERE id_rh='$id' ";
$res0=mysql_query ($req);
if($res0)echo 'local: maj <br/>';
header('Location: success2.php'); 
?>