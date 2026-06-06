<?php

$mdp = "employe";
$sel = "MonSel";

echo hash('sha256', $mdp . $sel);

?>