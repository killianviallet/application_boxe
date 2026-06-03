<?php
session_start();
include("traitement.php");

if ($_SESSION["role"] !== "boxeur") {
    header("Location: login.php");
    exit;
}

$message = "";

if(isset($_POST['valider_panier']))
{
    $message = "Merci pour votre achat !";

    unset($_SESSION['panier']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>PunchFlow</h2>
    <a href="javascript:history.back()">Retour</a>
    <a href="accueil.php">Accueil</a>
    <a href="achat.php">Achat</a>
</nav>

<div class="corps"><br><br>

    <h1>Mon panier</h1>

    <div class="panier">
    <?php

    if($message != "")
    {
        echo "<h2>".$message."</h2>";

        echo "
        <script>
            setTimeout(function() {
                window.location.href='achat.php';
            }, 3000);
        </script>
        ";
    }

    $total = 0;

    if(isset($_SESSION['panier']) && !empty($_SESSION['panier']))
    {
        foreach($_SESSION['panier'] as $id_prod => $quantite)
        {
            $req = $connexion->prepare(
                'SELECT * FROM produit WHERE id_prod = ?'
            );

            $req->execute([$id_prod]);

            $produit = $req->fetch(PDO::FETCH_ASSOC);

            if($produit)
            {
                $sousTotal =
                    $produit['prix_prod'] * $quantite;

                $total += $sousTotal;
                ?>

                <div class="card">

                    <h3>
                        <?php echo $produit['nom_prod']; ?>
                    </h3>

                    <p>
                        Quantité :
                        <?php echo $quantite; ?>
                    </p>

                    <p>
                        Prix unitaire :
                        <?php echo $produit['prix_prod']; ?> €
                    </p>

                    <p>
                        Sous-total :
                        <?php echo $sousTotal; ?> €
                    </p>

                </div>

                <?php
            }
        }

        ?>

        <h3>
            Total : <?php echo $total; ?> €
        </h3>

        <form method="POST">

            <button
                type="submit"
                name="valider_panier">
                Valider le panier
            </button>

        </form>

        
        <?php
    }
    else
    {
        if($message == "")
        {
            echo "<p>Votre panier est vide.</p>";
        }
    }

    ?>
</div>

</body>
</html>