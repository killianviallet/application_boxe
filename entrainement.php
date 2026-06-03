<?php

include("traitement.php");
include("traitement_entrainement.php");


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
    <title>Combat</title>
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
  <div class="corps"><br><br>
    <h1>Organiser Entrainement</h1>
    
    <div class="location">
        <form action="traitement_entrainement.php" method="post">

        <label for="id">ID Entrainement:</label><br>
        <input type="int" id="id_ent" name="id_ent"><br><br>
        
        <label for="id">Date Entrainement:</label><br>
        <input type="text" id="date_ent" name="date_ent"><br><br>

        <label for="boxeur">Heure de Début:</label><br>
        <input type="time" id="heure_debut_ent" name="heure_debut_ent"><br><br>
        
        <label for="date">Heure de Fin:</label><br>
        <input type="time" id="heure_fin_ent" name="heure_fin_ent"><br><br>
        
        <input type="submit" value="Ajouter Entrainement">
        </form>
    </div>
    </div>

    <div class="corps2"><br><br>
    <h1>Entrainement précédent</h1>
    <table>
        <tr>
            <th>ID Entrainement</th>
            <th>Date Entrainement</th>
            <th>Heure Début</th>
            <th>Heure Fin</th>
        </tr>
        <?php
        $result = $connexion->query("SELECT * FROM entrainement");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id_ent']."</td>";
            echo "<td>".$row['date_ent']."</td>";
            echo "<td>".$row['heure_debut_ent']."</td>";
            echo "<td>".$row['heure_fin_ent']."</td>";
            echo "</tr>";
            }
            ?>
    </table>
</div>
</body>
</html>