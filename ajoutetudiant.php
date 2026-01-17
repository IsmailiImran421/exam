<?php
require "Connexion.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $email = $_POST['email'];
 $adresse = $_POST['adresse'];
 $filiere = $_POST['filiere'];

 $result = $conn->query("INSERT INTO etudiants VALUES (NULL,'$nom','$prenom','$email','$adresse',$filiere)");
 if ($result) {
  echo "l'etudiant est ajouter";
 }
 else{
    echo "error leur de l'ajoute";
 }
}
?>