<?php

include ("traitement.php");
include ("traitement_location.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h2>PunchFlow</h2>
        <a href="accueil.php">Accueil</a>
        <a href="boxeur.php">Boxeur</a>
       <a href="entrainement.php">Entrainement</a>
        <a href="location.php">Location</a>
  </nav>
  <div class="corps"><br><br>
    <h1>Location d'un ring</h1>

    <div class="location">
        <form action="traitement_location.php" method="post">
        
        <label for="id">ID Location:</label><br>
        <input type="text" id="id_location" name="id_location"><br><br>

        <label for="boxeur">Date Location:</label><br>
        <input type="text" id="date_location" name="date_location"><br><br>
        
        <label for="time">Heure Début:</label><br>
        <input type="time" id="heure_debut" name="heure_debut"><br><br>

        <label for="date">Heure Fin:</label><br>
        <input type="time" id="heure_fin" name="heure_fin"><br><br>

        <label for="date">Nombre Externe:</label><br>
        <input type="text" id="nb_ext" name="nb_ext"><br><br>
        
        <label for="id">ID de l'entraineur en charge:</label><br>
        <input type="number" id="id_ent" name="id_ent"><br><br>

        <label for="id">ID du ring utilisé:</label><br>
        <input type="number" id="id_ring" name="id_ring"><br><br>

        <label for="id">ID de l'externe responsable:</label><br>
        <input type="number" id="id_ext" name="id_ext"><br><br>

        <input type="submit" value="Ajouter Location">
        </form>
    </div>
    </div>
     <div class="corps2"><br><br>
    <h1>Location en cours</h1>

     <table>
        <tr>
            <th>ID Location</th>
            <th>Date Location</th>
            <th>Heure Début</th>
            <th>Heure Fin</th>
            <th>Nombre Externe</th>
            <th>ID Entraineur</th>
            <th>ID Ring</th>
            <th>ID Externe</th>
        </tr>
        <?php
        $result = $connexion->query("SELECT * FROM location");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id_location']."</td>";
            echo "<td>".$row['date_location']."</td>";
            echo "<td>".$row['heure_debut']."</td>";
            echo "<td>".$row['heure_fin']."</td>";
            echo "<td>".$row['nb_ext']."</td>";
            echo "<td>".$row['id_ent']."</td>";
            echo "<td>".$row['id_ring']."</td>";
            echo "<td>".$row['id_ext']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>
