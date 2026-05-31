<?php

include("traitement.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="style.css">
</head>
 <nav>
    <h2>PunchFlow</h2>
    <a href="accueil.php">Accueil</a>
  </nav>
<body>
     <div class="corps"><br><br><br>
    <div class="login">
        <form action="traitement_login.php" method="post">

        <label for="id">Identifiant:</label><br>
        <input type="text" id="login" name="login"><br><br>
        
        <label for="id">Mot de passe:</label><br>
        <input type="password" id="mdp" name="mdp"><br><br>
        
        <input type="submit" value="Se connecter">
        </form>
    </div>
</div>
</body>
</html>