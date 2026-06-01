<?php

session_start();

if(isset($_POST['id_prod']))
{
    $id_prod = $_POST['id_prod'];

    if(!isset($_SESSION['panier']))
    {
        $_SESSION['panier'] = [];
    }

    if(isset($_SESSION['panier'][$id_prod]))
    {
        $_SESSION['panier'][$id_prod]++;
    }
    else
    {
        $_SESSION['panier'][$id_prod] = 1;
    }
}

header("Location: achat.php");
exit();