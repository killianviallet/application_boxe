<?php

include("traitement.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $login = $_POST["login"];
    $mdp = $_POST["mdp"];


    $sel = "MonSel";
    $mdp_hash = hash("sha256", $mdp . $sel);

    $req = $connexion->prepare("SELECT * FROM entraineur WHERE login_ent = ?");
    $req->execute([$login]);
    $entraineur = $req->fetch();

    if ($entraineur && $mdp_hash === $entraineur["mdp_ent"]) {
        $_SESSION["login"] = $entraineur["login_ent"];
        $_SESSION["role"] = "entraineur";

        header("Location: entrainement.php");
        exit;
    }


    $req = $connexion->prepare("SELECT * FROM boxeur WHERE login_boxeur = ?");
    $req->execute([$login]);
    $boxeur = $req->fetch();

    if ($boxeur && $mdp_hash === $boxeur["mdp_boxeur"]) {
        $_SESSION["login"] = $boxeur["login_boxeur"];
        $_SESSION["role"] = "boxeur";

        header("Location: achat.php");
        exit;
    }

    echo "Identifiants incorrects";
}
?>