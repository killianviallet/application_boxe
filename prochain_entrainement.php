<?php

session_start();
include("traitement.php");

if ($_SESSION["role"] !== "boxeur") {
    header("Location: login.php");
    exit;
}

$req = $connexion->query("
    SELECT *
    FROM entrainement
    ORDER BY date_ent DESC,
             heure_debut_ent DESC
    LIMIT 3
");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Derniers Entrainements</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>PunchFlow</h2>
    <a href="javascript:history.back()">Retour</a>
    <a href="accueil.php">Accueil</a>
    <a href="achat.php">Achat</a>
    <a href="prochain_entrainement.php">Prochain Entrainements</a>
</nav>

<div class="corps2">

    <br><br>

    <h1>Les 3 prochain entraînements</h1>

    <table>
        <tr>
            <th>ID Entraîneur</th>
            <th>Date Entraînement</th>
            <th>Heure Début</th>
            <th>Heure Fin</th>
        </tr>

        <?php

        while($row = $req->fetch(PDO::FETCH_ASSOC))
        {
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