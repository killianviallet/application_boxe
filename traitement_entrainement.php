<?php

session_start();
include("traitement.php");

function ajouterEntrainement($connexion, $id_ent, $date_ent, $heure_debut_ent, $heure_fin_ent) {
    $requete = "INSERT INTO entrainement (id_ent, date_ent, heure_debut_ent, heure_fin_ent) 
    VALUES (:id_ent, :date_ent, :heure_debut_ent, :heure_fin_ent)";

    $stmt = $connexion->prepare($requete);

    $stmt->execute([
        'id_ent' => $id_ent,
        'date_ent' => $date_ent,
        'heure_debut_ent' => $heure_debut_ent,
        'heure_fin_ent' => $heure_fin_ent
    ]);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_ent = $_POST['id_ent'];
    $date_ent = $_POST['date_ent'];
    $heure_debut_ent = $_POST['heure_debut_ent'];
    $heure_fin_ent = $_POST['heure_fin_ent'];

    ajouterEntrainement($connexion, $id_ent, $date_ent, $heure_debut_ent, $heure_fin_ent);

    header("Location: entrainement.php");
    exit(); 
}

$resultat = $connexion->query("SELECT * FROM entrainement");
?>