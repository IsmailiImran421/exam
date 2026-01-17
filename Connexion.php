<?php
try {
 $fichier = fopen("data.txt","r");
 $tab = explode("|",fgets($fichier));
 $serveur = $tab[0];
 $user = $tab[1];
 $motPass = $tab[2];
 $db = $tab[3];
 $conn = new mysqli($serveur,$user,"",$db);
 fclose($fichier);
} catch (mysqli_sql_exception $e) {
 die("Erreur dans la connecion");
}
?>