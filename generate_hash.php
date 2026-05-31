<?php

$mdp = "entraineur";
$sel = "MonSel";

echo hash('sha256', $mdp . $sel);

?>