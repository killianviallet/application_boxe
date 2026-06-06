<?php

session_start();
include("traitement.php");

if ($_SESSION["role"] !== "entraineur") {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxeur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h2>PunchFlow</h2>
        <a href="javascript:history.back()">Retour</a>
        <a href="accueil.php">Accueil</a>
        <a href="boxeur.php">Boxeur</a>
        <a href="entrainement.php">Entrainement</a>
        <a href="location.php">Location</a>
  </nav>
  <div class="corps"> <br><br>
    <h1>Liste des boxeurs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Sexe</th>
        </tr>
        <?php
       $resultat = $connexion->query("SELECT * FROM boxeur");
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id_boxeur']."</td>";
            echo "<td>".$row['nom_boxeur']."</td>";
            echo "<td>".$row['prenom_boxeur']."</td>";
            echo "<td>".$row['date_naiss_boxeur']."</td>";
            echo "<td>".$row['sexe_boxeur']."</td>";
            echo "</tr>";
        }
        ?>
        </table> 
</div>
</body>
</html>