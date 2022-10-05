<?php
$bdd = new PDO('mysql:host=localhost;dbname=carnet;', 'cedricCH', 'kh@-gdFW(BW[mv9w');
$allusers = $bdd->query('SELECT * FROM carnet');
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('SELECT PRENOM, NOM FROM carnet WHERE NOM LIKE "%' . $recherche . '%" ORDER BY ID DESC');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Barre de recherche</title>
</head>

<body>

    <h1>Barre de recherche</h1>

    <form method="GET">
        <input type="search" name="s" placeholder="Rechercher dans le carnet" autocomplete="off">
        <input type="submit" name="envoyer">
    </form>

    <section class="afficher_utilisateur">

        <?php
        
            if($allusers->rowCount() > 0){
                while($user = $allusers->fetch()){
                    ?>
                    <p><?= $user['PRENOM'], " ", $user['NOM']; ?></p>
                    <?php
                }
            }
            else {
                ?>
                <p>Aucun utilisateur trouvé</p>
                <?php
            }
        ?>
        
    </section>

</body>

</html>