<?php
include("traitement.php");
include("traitement_achat.php");
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
        <a href="accueil.php">Accueil</a>
        <a href="achat.php">Achat</a>
  </nav>
  <div class="corps">
    <h1>Nos produits</h1>
<div class="cards-container">

<?php

$result = $connexion->query("SELECT * FROM produit");

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

?>

    <div class="card">

        <img src="<?php echo $row['image']; ?>" alt="produit">

        <h3>
            <?php echo $row['nom_prod']; ?>
        </h3>

        <p>
            <?php echo $row['prix_prod']; ?> $
        </p>

        <p>
            Stock : <?php echo $row['stock']; ?>
        </p>

        <form action="traitement_achat.php" method="POST">

            <input type="hidden" name="id_prod"
            value="<?php echo $row['id_prod']; ?>">

            <button type="submit">
                Acheter
            </button>

        </form>

    </div>

<?php
}
?>

</div>

</body>
</html>