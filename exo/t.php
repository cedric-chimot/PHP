<?php //début du programme

$tableau_1 = array(8, 12, 21, 28);
$tableau_2 = array(1, 4, 7, 8, 15, 67, 29, 22);
$tableau_3 = array(1, 4, 7, 8, 15, 67, 29, 28);
$tableau_diff = array_diff($tableau_1, $tableau_2, $tableau_3);

echo "<pre>";

echo "<table width=80% border=1>
  <tr>
    <th>Tableau_1</th>
    <th>Tableau 2</th>
    <th>Tableau 3 </th>
    <th>
        <small>Dans tableau_1 et pas dans tableau_2 ni 3
    </th>
  <tr>
  <td>";

//tableau 1
echo "<table border=1 align=center>                                                                                                                   
        <tr>
            <th>Valeur</th>
            <th>Clé</th>
        </tr>";

foreach ($tableau_1 as $maClé => $maValeur) {
    echo "<tr>
            <td>$maValeur</td>
            <td>$maClé</td>
          </tr>";
}

echo "</table></td><td>";

//tableau 2
echo "<table border=1 align=center>
        <tr>
            <th>Val.</th>
            <th>Clé</th>
        </tr>";

foreach ($tableau_2 as $maClé => $maValeur) {
    echo "<tr><td>$maValeur</td>
    <td>$maClé</td></tr>";
}

echo "</table></td><td>";

//tableau 3

echo "<table border=1 align=center>
    <tr>
        <th>Val.</th>
        <th>Clé</th>
    </tr>";

foreach ($tableau_3 as $maClé => $maValeur) {
    echo "<tr>
            <td>$maValeur</td>
            <td>$maClé</td>
          </tr>";
}

echo "</table></td><td>";

//tableau diff

echo "<table border=1 bordercolor=green align=center>
            <tr>
                <th>Valeur</th>
                <th>Clé</th>
            </tr>";
foreach ($tableau_diff as $maClé => $maValeur) {
    echo "<tr>
            <td>$maValeur</td>
            <td>$maClé</td>
          </tr>";
}

echo "</table></table>";

$dicoMois = array("January"=>'Janvier',
    'February'=>'Février','March'=>'Mars',
    'April'=>'Avril','May'=>'Mai',
    'June'=>'Juin','July'=>'Juillet',
    'August'=>'Aout','September'=>'Septembre',
    'October'=>'Octobre',
    'November'=>'Novembre','December'=>'Décembre');

$dicoSemaine = array("Monday"=>'Lundi',
    'Tuesday'=>'Mardi','Wednesday'=>'Mercredi',
    'Thursday'=>'Jeudi','Friday'=>'Vendredi',
    'Saturday'=>'Samedi','Sunday'=>'Dimanche');
echo "<table>";

foreach($dicoMois as $j => $maValeur){
    print "<tr>
                <td>Anglais : $j </td>
                <td><font color=red>Français : $maValeur</td>
            </tr>";
}

echo "<br /><br />";

foreach($dicoSemaine as $k => $myValue) 
{
    print "<tr>
                <td>Anglais : $k </td>
                <td><font color=blue> Français : $myValue </td>
           </tr>";
}

echo "</table>";

?>

<?php //début du programme
echo "<br />";
$moisEnCours = date("m");
settype($moisEnCours,'int');
$monthInfo = array(1=>array("Janvier", 31,"Hiver"),
    array("Fevrier", 28,"Hiver"),
    array("Mars", 31,"Hiver"),
    array("Avril", 31,"Printemps"),
    array("Mai", 31,"Printemps"),
    array("Juin", 31,"Printemps"),
    array("Juillet", 31,"Eté"),
    array("Aout", 31,"Eté"),
    array("Septembre", 30,"Eté"),
    array("Octobre", 31,"Automne"),
    array("Novembre", 30,"Automne"),
    array("Decembre", 31,"Automne"));

print("<small>Nous sommes au mois de {$monthInfo[$moisEnCours][0]} 
    qui a {$monthInfo[$moisEnCours][1]} jours et nous sommes en {$monthInfo[$moisEnCours][2]} <br/>");

echo "</pre>";

?>

<?php 

    $numeroDeMois = intval(date("m"));
    $moisFrancais = array(1=>'Janvier','Février','Mars','Avril','Mai','Juin',
                        'Juillet','Aout','Septembre','Octobre','Novembre','Décembre');
    $cellColor = array(1=>'blue','white','red','yellow','grey','lime',
                        'lightblue','fuchsia', 'lightgrey','olive','pink','purple');
                        
    echo "<table border=1> ";

    for($i=1 ; $i<=12 ; $i++)
    {
        echo "<td bgcolor=$cellColor[$i]>".$i."</td><td>".$moisFrancais[$i]."</td>" ;
        ($i%3 == 0) ? print ("</tr><tr>") : print ("");
    }

    echo "</table>";

?>