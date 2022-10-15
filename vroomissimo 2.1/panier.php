<?php

include 'config.php';

session_start();

$client_id = $_SESSION['client_id'];

if (!isset($client_id)) {
    header('location:login.php');
};

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM `panier` WHERE id = '$delete_id'")
        or die('Echec de la requête');
    header('location:panier.php');
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
    <title>Panier</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>Panier</h3>
        <p> <a href="home.php">Accueil</a> / Panier </p>
    </div>

    <section class="panier">

        <h1 class="titre">Votre panier</h1>

        <table class="box-container">
            <tr>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Prix</th>
                <th>Photo</th>
            </tr>
            <?php
            $total = 0;
            $select_panier = mysqli_query($con, "SELECT * FROM `panier`
            WHERE client_id = '$client_id'")
                or die('Echec de la requête');
            if (mysqli_num_rows($select_panier) > 0) {
                while ($fetch_panier = mysqli_fetch_assoc($select_panier)) {
            ?>
                    <tr class="box">
                        <td class="marque">
                            <?php echo $fetch_panier['marque']; ?>
                        </td>
                        <td class="modele">
                            <?php echo $fetch_panier['modele']; ?>
                        </td>
                        <td class="prix">
                            <?php echo $fetch_panier['prix']; ?>
                        </td>
                        <td class="image">
                            <img src="image/<?php echo $fetch_panier['image']; ?>" alt="">
                        </td>
                    </tr>
                    <tr class="quantite">
                        <th>Quantité</th>
                        <td>1</td>
                    </tr>
                    <tr class="total">
                        <th>Total à payer(ttc)</th>
                        <td><?php echo $total = ($fetch_panier['prix'] * 1); ?>€</td>
                    </tr>
                    <tr class="supprimer">
                        <th>Supprimer</th>
                        <td>
                            <a href="panier.php?delete=<?php echo $fetch_panier['id']; ?>"
                                class="fa-solid fa-trash-can" onclick="return confirm('Supprimer le produit ?');">
                            </a>
                        </td>
                    </tr>
                    
            <?php
                }
            } else {
                echo '<p class="vide">Votre panier est vide</p>';
            }
            ?>
        </table>

    </section>



    <?php include 'footer.php'; ?>

    <script src="js/script/script.js"></script>

</body>

</html>