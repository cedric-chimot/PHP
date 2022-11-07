<?php

require_once 'classes/compte.php';
require_once 'classes/compteCourant.php';
require_once 'classes/compteEpargne.php';
require_once 'classes/compteEpargneCourant.php';

echo "<pre>";
//on instancie le compte
$compte1 = new CompteCourant('Cedric', 500, 200);
$compte1->retirer(200);
var_dump($compte1);

$compteEpargne = new CompteEpargneCourant('Cedric', 200, 10, 200);
var_dump($compteEpargne);

$compteEpargne->verserInterets();
$compteEpargne->retirer(300);
var_dump($compteEpargne);

echo "</pre>";

?>