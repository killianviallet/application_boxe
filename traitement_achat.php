<?php
session_start();
include("traitement.php");

// init panier si besoin
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

$id = $_POST['id_prod'] ?? null;
$action = $_POST['action'] ?? null;

// =======================
// ➕ AJOUT PRODUIT
// =======================
if ($action == "plus" && $id) {

    $id = (int)$id;

    // vérifier stock
    $stmt = $connexion->prepare("SELECT stock FROM produit WHERE id_prod = ?");
    $stmt->execute([$id]);
    $prod = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($prod && $prod['stock'] > 0) {

        // ajouter au panier
        $_SESSION['panier'][$id] = ($_SESSION['panier'][$id] ?? 0) + 1;

        // décrémenter stock
        $update = $connexion->prepare("
            UPDATE produit 
            SET stock = stock - 1 
            WHERE id_prod = ? AND stock > 0
        ");
        $update->execute([$id]);
    }
}

// =======================
// ➖ RETIRER PRODUIT
// =======================
if ($action == "moins" && $id) {

    $id = (int)$id;

    if (!empty($_SESSION['panier'][$id])) {

        // retirer du panier
        $_SESSION['panier'][$id]--;

        // remettre stock
        $update = $connexion->prepare("
            UPDATE produit 
            SET stock = stock + 1 
            WHERE id_prod = ?
        ");
        $update->execute([$id]);

        // supprimer si quantité = 0
        if ($_SESSION['panier'][$id] <= 0) {
            unset($_SESSION['panier'][$id]);
        }
    }
}

// =======================
// ✔ VALIDATION PANIER
// =======================
if ($action == "valider") {

    // ici tu pourrais enregistrer en BDD si tu veux (commande)

    $_SESSION['panier'] = [];

    header("Location: achat.php?success=1");
    exit();
}

// retour page achat
header("Location: achat.php");
exit();
?>