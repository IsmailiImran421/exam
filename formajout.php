<?php
require "Connexion.php";
$sql = "SELECT * From filieres";
$tabFiliere = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
 <form action="ajoutetudiant.php" method="POST">
  Nom :<input type="text" name="nom"><br><br>
  Prenom :<input type="text" name="prenom"><br><br>
  Email :<input type="email" name="email"><br><br>
  Adresse :<input type="text" name="adresse"><br><br>
  Filiere :
  <select name="filiere">
   <?php foreach ($tabFiliere as $tab) {?>
   <option value="<?=$tab['idFiliere']?>"><?=$tab['designation']?></option>
   <?php } ?>
  </select><br><br>
  <button type="submit">Ajouter</button>
 </form>
</body>
</html>