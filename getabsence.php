<?php
require "Connexion.php";

$sql = "SELECT * From filieres";
$tabFiliere = $conn->query($sql);

$filiere = $_GET['filiere'] ?? "";
if (empty($filiere)) { 

 $sql1="SELECT * FROM etudiants";
 $result = $conn->query($sql1);

}
else{

 $sql1="SELECT * FROM etudiants WHERE idFiliere=$filiere";
 $result = $conn->query($sql1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
 <form action="" method="GET">
    Filiere :
  <select name="filiere">
   <?php foreach ($tabFiliere as $tab) {?>
   <option value="<?=$tab['idFiliere']?>"><?=$tab['designation']?></option>
   <?php } ?>
  </select>
    <button type="submit">Recherche</button>
 </form>
 <table>
  <tr>
   <th>nom</th>
   <th>prenom</th>
   <th>email</th>
   <th>ajouter absence</th>
  </tr>
  <tr>
   <?php while ($tabEtudiant= $result->fetch_assoc()):?>
   <tr>
   <td><?= $tabEtudiant['nom'] ?></td>
   <td><?= $tabEtudiant['prenom'] ?></td>
   <td><?= $tabEtudiant['email'] ?></td>
   <td><a href="ajoutAbsence.php?idEtudiant=<?= $tabEtudiant['idEtudiant'] ?>">ajouter</a></td>
   </tr>
   <?php endwhile;?>
 
  
</table>
</body>
</html>