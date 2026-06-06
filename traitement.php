<?php

//$host = "localhost";
//$dbname = "boxe";
//$username = "root";
//$password = "";
$host = "mysql-punchflow.alwaysdata.net";
$dbname = "punchflow_db";
$username = "punchflow";
$password = "Killian13013";

$connexion = new PDO( "mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
?>