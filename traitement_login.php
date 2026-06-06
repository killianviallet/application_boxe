<?php

session_start();
include("traitement.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $login = $_POST["login"];
    $mdp = $_POST["mdp"];


    $sel = "MonSel";
    $mdp_hash = hash("sha256", $mdp . $sel);

    $requete = $connexion->prepare("SELECT * FROM entraineur WHERE login_ent = ? ");
    $requete->execute([$login]);
    $entraineur = $requete->fetch();

    if ($entraineur && $mdp_hash === $entraineur["mdp_ent"]) {
        $_SESSION["login"] = $entraineur["login_ent"];
        $_SESSION["role"] = "entraineur";

        header("Location: entrainement.php");
        exit;
    }


    $requete = $connexion->prepare("SELECT * FROM boxeur WHERE login_boxeur = ?");
    $requete->execute([$login]);
    $boxeur = $requete->fetch();

    if ($boxeur && $mdp_hash === $boxeur["mdp_boxeur"]) {
        $_SESSION["login"] = $boxeur["login_boxeur"];
        $_SESSION["role"] = "boxeur";

        header("Location: prochain_entrainement.php");
        exit;
    }

    echo "Identifiants incorrects";
}
?>