<?php

session_start();
include("traitement.php");

function ajouterLocation($connexion, $id_location, $date_location, $heure_debut, $heure_fin, $nb_ext, $id_ent, $id_ring, $id_ext) {

    $requete = "INSERT INTO location 
    (id_location, date_location, heure_debut, heure_fin, nb_ext, id_ent, id_ring, id_ext) 
    VALUES 
    (:id_location, :date_location, :heure_debut, :heure_fin, :nb_ext, :id_ent, :id_ring, :id_ext)";

    $stmt = $connexion->prepare($requete);

    $stmt->execute([
        'id_location' => $id_location,
        'date_location' => $date_location,
        'heure_debut' => $heure_debut,
        'heure_fin' => $heure_fin,
        'nb_ext' => $nb_ext,
        'id_ent' => $id_ent,
        'id_ring' => $id_ring,
        'id_ext' => $id_ext
    ]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_location = $_POST['id_location'];
    $date_location = $_POST['date_location'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $nb_ext = $_POST['nb_ext'];

    $id_ent = $_POST['id_ent'];
    $id_ring = $_POST['id_ring'];
    $id_ext = $_POST['id_ext'];

    ajouterLocation(
        $connexion,
        $id_location,
        $date_location,
        $heure_debut,
        $heure_fin,
        $nb_ext,
        $id_ent,
        $id_ring,
        $id_ext
    );

    header("Location: location.php");
    exit();
}

$result = $connexion->query("SELECT * FROM location");
?>