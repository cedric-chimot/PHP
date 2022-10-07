<?php
$bdd = new PDO('mysql:host=localhost;dbname=voitures;', 'cedricCH', 'K61R)*TBHQFzU91*');
$allcars = $bdd->query('SELECT * FROM voiture');
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allcars = $bdd->query('SELECT Modele, Km, Prix FROM voiture WHERE Modele LIKE "%' . $recherche . '%"');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Barre de recherche</title>
</head>

<body>

    <h1>Rechercher un véhicule</h1>

    <form method="GET">
        <input type="search" name="s" placeholder="Rechercher un véhicule" autocomplete="off">
        <input type="submit" name="envoyer">
    </form>

    <section class="afficher_voitures">

        <?php
        
            if($allcars->rowCount() > 0){
                while($cars = $allcars->fetch()){
                    ?>
                    <p><?= $cars['Modele'], ", ", $cars['Km'], " km, ", $cars['Prix']; ?></p>
                    <?php
                }
            }
            else {
                ?>
                <p>Aucune voitures trouvées</p>
                <?php
            }
        ?>
        
    </section>

</body>

</html>