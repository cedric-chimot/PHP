<?php
require_once 'classes/personnes.php';

echo "Création de Cedric chez Java -> ";
$p1 = new Personne("Cedric", "Java");
$p1->afficher();
echo '<br/><br/>';

echo "Cedric va chez JAVA -> ";
$p1->setSociete("JAVA");
echo '<br/><br/>';
$p1->afficher();
echo '<br/><br/>';

echo "Création de Toto -> ";
$p2 = new Personne("Toto");
$p2->afficher();
echo '<br/><br/>';

echo "Le groupe a un effectif de " . Personne::getEffectif() . " Personne(s).";
echo '<br/><br/>';

echo "Cedric veut aller chez PHP -> ";
$p1->setSociete("PHP");
echo '<br/><br/>';
$p1->afficher();
echo '<br/><br/>';

echo "Cedric quitte sa société -> ";
$p1->quitterSociete();
echo '<br/><br/>';
$p1->afficher();
echo '<br/><br/>';

echo "Cedric veut aller chez PHP -> ";
$p1->setSociete("PHP");
echo '<br/><br/>';
$p1->afficher();


?>