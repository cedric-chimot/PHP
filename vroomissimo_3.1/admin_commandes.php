<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if(isset($_POST['update_commande'])){
    $update_commande_id = $_POST['commande_id'];
    $update_paiement = $_POST['update_paiement'];
    mysqli_query($con, "UPDATE `commande`
        SET statut_paiement = '$update_paiement'
        WHERE id = '$update_commande_id'")
        or die('Echec de la requête');
    $message[] = 'Statut de la commande mis à jour !';
}

if(isset($_GET['delete'])){
    $delete_commande_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `commande` WHERE id = '$delete_commande_id'")
    or die('Echec de la requête');
    header('location:admin_commandes.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/admin.css">
    <title>Commandes</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="commandes">

        <h1 class="titre">Commandes effectuées</h1>

        <div class="box-container">
            <?php
                $select_commandes = mysqli_query($con, "SELECT * FROM `commande`")
                    or die("Echec de la requête");
                if(mysqli_num_rows($select_commandes) > 0){
                    while($fetch_commande = mysqli_fetch_assoc($select_commandes)){
            ?>
        
            <div class="box">
                <p>Date commande : 
                    <span><?php echo $fetch_commande['date_commande']?></span> 
                </p>
                <p>ID Client : <span><?php echo $fetch_commande['client_id']?> </span> </p>
                <p>Nom : <span><?php echo $fetch_commande['nom']?> </span> </p>
                <p>Telephone : <span><?php echo $fetch_commande['telephone']?> </span> </p>
                <p>Email : <span><?php echo $fetch_commande['email']?> </span> </p>                
                <p>Adresse : <span><?php echo $fetch_commande['adresse']?> </span> </p>
                <p>CP : <span><?php echo $fetch_commande['cp']?> </span> </p>
                <p>Ville : <span><?php echo $fetch_commande['ville']?> </span> </p>
                <p>Pays : <span><?php echo $fetch_commande['pays']?> </span> </p>
                <p>Total articles : 
                    <span><?php echo $fetch_commande['total_articles']?> </span> 
                </p>
                <p>Prix total : 
                    <span><?php echo $fetch_commande['prix_total']?> € </span> 
                </p>
                <p>Paiement : <span><?php echo $fetch_commande['paiement']?> </span> </p>
                <form action="" method="post">
                    <input type="hidden" name="commande_id"
                        value="<?php echo $fetch_commande['id']; ?>">
                    <select name="update_paiement">
                        <option value="" selected disabled>
                            <?php echo $fetch_commande['statut_paiement']; ?>
                        </option>
                        <option value="en attente">en attente</option>
                        <option value="completee">completee</option>
                    </select>
                    <input type="submit" value="Modifier" name="update_commande" class="option-btn">
                    <a href="admin_commandes.php?delete=<?php echo $fetch_commande['id']; ?>"
                        onclick="return confirm('delete this order?');" class="delete-btn">Supprimer</a>
                </form>
            </div>
            <?php
                        }
                    }else{
                        echo '<p class="vide">Aucune commande</p>';
                }
            ?>
        </div>

    </section>

    <script src="js/admin_script.js"></script>

</body>

</html>