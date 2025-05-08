<?php
include("connect.php");
$idd ='';
$nom = $_POST['nom'];$nom = mysql_real_escape_string(trim($nom));
$prenom = $_POST['prenom'];$prenom = mysql_real_escape_string(trim($prenom));
$poste = $_POST['poste'];$poste = mysql_real_escape_string(trim($poste));
$D = $_POST['D'];$D = mysql_real_escape_string(trim($D));
$tel = $_POST['tel'];$tel = mysql_real_escape_string(trim($tel));
$email= $_POST['email'];$email = mysql_real_escape_string(trim($email));
$cv='';
$date_conff = date('Y-m-d H:i:s');

                        $sql = "INSERT INTO cand_span (nom , prenom,poste , date_nais, tell, email, cv,date_conff) VALUES ('$nom', '$prenom','$poste', '$D',  '$tel','$email','$cv','$date_conff')";
                        $res = mysql_query($sql);

					if ($res) {
					echo 'Insertion reussie';

                    $chemin = "uploads1/candidatures_span/$idd/";
                    if (!file_exists($chemin)) {
                        if (mkdir($chemin, 0777, true)) {
                            echo "Les dossiers ont été créés avec succès.";
                        } else {
                            echo "La création des dossiers a échoué.";
                        }
                    } else {
                        echo "Le dossier existe déjà.";
                    
                    }
                    echo"$chemin";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Vérifiez si un fichier a été téléchargé
                        if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
                    
                            // Récupérer les informations sur le fichier
                            $cv = $_FILES['cv'];
                            $nom_cv = $cv['name'];             
                            $tmp_cv = $cv['tmp_name'];         
                            $type_cv = $cv['type'];
                            $taille_cv = $cv['size']; 
                            if (!file_exists($chemin)) {
                                mkdir($chemin, 0777, true); // Crée le répertoire avec les bonnes permissions
                            }
                    }$serveur="localhost";
                    $utilisateur="root";
                    $mot_de_passe="";
                    $base_de_donnee="my_database";        
                    $mysqli=new mysqli($serveur,$utilisateur,$mot_de_passe,$base_de_donnee);
                    $result = $mysqli->query("SELECT id_c FROM cand_span ORDER BY id_c DESC LIMIT 1");
                    $row = $result->fetch_assoc();
                    $id_c=$row['id_c'];
                    $extension = pathinfo($nom_cv, PATHINFO_EXTENSION);
                    $nouveau_nom = strtolower($prenom . "_" . $nom . "_" . $id_c . "."  . $extension);  
                    // Créer un chemin complet avec le nom du fichier
                    $chemin_fichier = $chemin . basename($nouveau_nom);
                    
                    // Déplacer le fichier téléchargé vers le répertoire spécifié
                    if (move_uploaded_file($tmp_cv, $chemin_fichier)) {
                        echo "Le fichier a été téléchargé avec succès sous le nom : " . $nouveau_nom;
                    }
                    $cvUrl = $chemin_fichier;
                    $sqlCv = "UPDATE  cand_span SET cv='$cvUrl' WHERE id_c='$id_c'";
                    $stmtCv = $mysqli->prepare($sqlCv);
                    if ($stmtCv->execute()) {
                        echo "CV URL saved in the database: <a href='$cvUrl'>$cvUrl</a>";
                    } else {
                        echo "Failed to save CV URL: " . $stmtCv->error;
                    }
                    }
                    $requete = $mysqli->query("SELECT date_conff FROM cand_span ORDER BY date_conff DESC LIMIT 1");
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $email = $_POST['email'];
                    
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "Adresse e-mail valide : " . htmlspecialchars($email);
                        } else {
                            echo "Adresse e-mail invalide.";
                        }
                    }
                    
                    
                        }
                                        else 
                                        {
                                       //afficher l'erreur si elle existe
                                        die(mysql_error());}
                                        echo '<div class="success-message">Formulaire soumis avec succès ! Merci'.'</div>';
                                        //rediriger vers l'interface d'ajout
                                        header("location:succes.php");
                                        exit();
                                        ?>