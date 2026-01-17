<?php
require "Connexion.php";

$sql = "SELECT * FROM tdtps";
$result = $conn->query($sql);

if($_SERVER['REQUEST_METHOD']=='POST'){
 $tdtp = $_POST['tdtp'];
 $dateAbsence = $_POST['date'];
 $nbHeure = $_POST['nbHeure'];
 $idEtudiant = isset($_GET['idEtudiant']) ? intval($_GET['idEtudiant']) : 0;
 if($idEtudiant>0){
   $result = $conn->query("INSERT INTO absences VALUES (NULL,$dateAbsence,$nbHeure,0,'',$tdtp,$idEtudiant)");
   echo "l'absence est enregister avec succes";
 }
else{
 echo "erreur";
}
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
 <form action="" method="POST">
  TDTP :
  <select name="tdtp">
  <?php while ($tabTdTp = $result->fetch_assoc()) :?>
   <option value="<?=$tabTdTp['idTdtp']?>"><?=$tabTdTp['libelle']?></option>
   <?php endwhile; ?>
  </select><br><br>
  Date absence :<input type="text" name="date"><br><br>
  Nombre d'heure :<input type="int" name="nbHeure"><br><br>
  <button type="submit">ajouter</button>
 </form>
</body>
</html>