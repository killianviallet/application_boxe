<?php

include("traitement.php");

if ($_SESSION["role"] !== "boxeur") {
    header("Location: login.php");
    exit;
}

$nbArticles = 0;

if(isset($_SESSION['panier']))
{
    $nbArticles = array_sum($_SESSION['panier']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PunchFlow</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>PunchFlow</h2>
    <a href="javascript:history.back()">Retour</a>
    <a href="accueil.php">Accueil</a>
    <a href="achat.php">Achat</a>
    <a href="prochain_entrainement.php">Prochain entrainement</a>
    <a href="panier.php">
        Panier (<?php echo $nbArticles; ?>)
    </a>
</nav>

<div class="corps"><br><br>

    <h1>Nos produits</h1>

    <div class="cards-container">

    <?php

    $result = $connexion->query("SELECT * FROM produit");

    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
    ?>

        <div class="card">

            <img src="<?php echo $row['image']; ?>" alt="produit">

            <h3>
                <?php echo $row['nom_prod']; ?>
            </h3>

            <p>
                <?php echo $row['prix_prod']; ?>€
            </p>

            <p>
                Stock : <?php echo $row['stock']; ?>
            </p>

            <form action="traitement_achat.php" method="POST">

                <input
                    type="hidden"
                    name="id_prod"
                    value="<?php echo $row['id_prod']; ?>">

                <button type="submit">
                    Ajouter au panier
                </button>

            </form>

        </div>

    <?php
    }
    ?>

    </div>

</div>

</body>
</html>