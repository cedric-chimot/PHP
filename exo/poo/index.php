<?php

require_once 'classes/compte.php';

//on instancie le compte
$compte1 = new compte('Cedric');

//on écrit dans la propriété titulaire
// $compte1->titulaire = 'Cedric';

//on écrit dans la propriété solde
$compte1->solde = '500';

//on dépose 100 €
$compte1->deposer(100);

var_dump($compte1);

$compte1->voirSolde();

$compte1->retirer(500);
var_dump($compte1);

//autre méthode :
// <p><?= $compte1->voirSolde()</p>

?>
<!-- <php
// $compte2 = new compte('Toto');

// $compte2->titulaire = 'Toto';

// $compte2->solde = '259.75';

// var_dump($compte2); -->

<!-- ?> --> 