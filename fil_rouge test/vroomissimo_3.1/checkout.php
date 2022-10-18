<?php

include 'config.php';

session_start();

$client_id = $_SESSION['client_id'];

if (!isset($client_id)) {
    header('location:login.php');
};

if(isset($_POST['commander'])){

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $paiement = mysqli_real_escape_string($con, $_POST['paiement']);
    $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
    $cp = mysqli_real_escape_string($con, $_POST['cp']);
    $ville = mysqli_real_escape_string($con, $_POST['ville']);
    $pays = mysqli_real_escape_string($con, $_POST['pays']);
    $date_commande = date('d-M-Y');

    $total_panier = 0;
    $article_panier[] = '';

    $panier_query = mysqli_query($con, "SELECT * FROM `panier`
        WHERE `client_id` = '$client_id'") or die('Echec de la requête');
        if(mysqli_num_rows($panier_query) > 0){
            while($panier_item = mysqli_fetch_assoc($panier_query)){
                $article_panier[] = $panier_item['marque'] . ', ' . $panier_item['modele'];
                $sous_total = $panier_item['prix'];
                $total_panier += $sous_total;
            }
        }

    $total_articles = implode(',', $article_panier);

    $commande_query = mysqli_query($con, "SELECT * FROM `commande`
        WHERE nom = '$nom' AND telephone = '$telephone' AND email = '$email'
        AND paiement = '$paiement' AND adresse = '$adresse' AND cp = '$cp'
        AND ville = '$ville' AND pays = '$pays' AND total_articles = '$total_articles'
        AND prix_total = '$total_panier'")
        or die('Echec de la requête');

    if($total_panier == 0){
        $message[] = 'Votre panier est vide';
    }else{
        if(mysqli_num_rows($commande_query) > 0){
            $message[] = 'Votre commande a déjà été passée !';
        }else{
            mysqli_query($con, "INSERT INTO `commande`(client_id, nom, telephone, email, paiement,
            adresse, cp, ville, pays, total_articles, prix_total, date_commande)
            VALUES('$client_id', '$nom', '$telephone', '$email', '$paiement', '$adresse', '$cp', '$ville', '$pays',
            '$total_articles', '$total_panier', '$date_commande')") or die('Echec de la requête');
            $message[] = 'Commande effectuée !';
            mysqli_query($con, "DELETE FROM `panier` WHERE `client_id` = '$client_id'") or die('Echec de la requête');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Vérification</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading_checkout">
        <h3>Votre commande</h3>
        <p> <a href="home.php">Accueil</a> / Commande </p>
    </div>

    <section class="display_commande">
        <h3>Votre panier</h3>
        <?php
            $total = 0;
            $select_panier = mysqli_query($con, "SELECT * FROM `panier` 
                WHERE client_id = '$client_id'")
                or die('Echec de la requête');
            if(mysqli_num_rows($select_panier) > 0){
            while($fetch_panier = mysqli_fetch_assoc($select_panier)){
                $sous_total = ($fetch_panier['prix'] * 1);
                $total += $sous_total;   
        ?>
        <p class="achat"> 
            <?php echo $fetch_panier['marque'] . ', '; ?>
            <?php echo $fetch_panier['modele'] . ', '; ?>
            <span>
                <?php echo $fetch_panier['prix'] . '€' . ', '; ?>
                <span class="qte">Quantité : 1</span> 
            </span>

        </p>
        <?php
                }
            } else {
                echo '<p class="vide">Votre panier est vide</p>';
            }
        ?>
        <div class="total_panier">
            <p class="total">Total à payer : <span><?php echo $total; ?> €</span></p>
        </div>

    </section>

    <section class="checkout">

        <form action="" method="post">
            <h3>Valider votre commande</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Votre nom :</span>
                    <input type="text" name="nom" placeholder="entrer votre nom" required>
                </div>
                <div class="inputBox">
                    <span>Votre telephone :</span>
                    <input type="text" name="telephone" placeholder="numero de telephone" required>
                </div>
                <div class="inputBox">
                    <span>Votre email :</span>
                    <input type="email" name="email" placeholder="entrer votre email" required>
                </div>
                <div class="inputBox">
                    <span>Mode de paiement :</span>
                    <select name="paiement">
                        <option value=""></option>
                        <option value="Paiement à la livraison">Paiement à la livraison</option>
                        <option value="Carte bancaire">Carte bancaire</option>
                        <option value="Virement bancaire">Virement bancaire</option>
                        <option value="Paypal">Paypal</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Adresse :</span>
                    <input type="text" name="adresse" placeholder="entrer votre adresse" required>
                </div>
                <div class="inputBox">
                    <span>Code postal :</span>
                    <input type="text" name="cp" placeholder="code postal" required>
                </div>
                <div class="inputBox">
                    <span>Ville :</span>
                    <input type="text" name="ville" placeholder="votre ville" required>
                </div>
                <div class="inputBox">
                    <span>Pays :</span>
                    <input type="text" name="pays" placeholder="votre pays" required>
                </div>
            </div>
            <input type="submit" class="btn" name="commander" value="Commmander" />
        </form>

    </section>


    <?php include 'footer.php'; ?>

    <script src="js/script/script.js"></script>

</body>

</html>