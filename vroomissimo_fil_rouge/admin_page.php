<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
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
    <title>Tableau de bord</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <!-- admin tableau de bord début -->

    <section class="dashboard">

        <h1 class="titre">Tableau de bord</h1>

        <div class="box-container">

            <div class="box">
                <?php
                    $select_annonces = mysqli_query($con, "SELECT * FROM `annonce`")
                    or die('Echec de la requête');
                    $nb_annonces = mysqli_num_rows($select_annonces);
                ?>
                <h3><?php echo $nb_annonces; ?></h3>
                <p>Nombre d'annonces</p>
            </div>

            <div class="box">
                <?php
                    $select_clients = mysqli_query($con, "SELECT * FROM `utilisateur`
                    WHERE Type_user = 'client'") or die('Echec de la requête');
                    $nb_clients = mysqli_num_rows($select_clients);
                ?>
                <h3><?php echo $nb_clients; ?></h3>
                <p>Nombre de clients</p>
            </div>

            <div class="box">
                <?php
                    $select_admin = mysqli_query($con, "SELECT * FROM `utilisateur`
                    WHERE Type_user = 'admin'") or die('Echec de la requête');
                    $nb_admin = mysqli_num_rows($select_admin);
                ?>
                <h3><?php echo $nb_admin; ?></h3>
                <p>Nombre d'admin</p>
            </div>

            <div class="box">
                <?php
                    $select_inscrits = mysqli_query($con, "SELECT * FROM `utilisateur`")
                    or die('Echec de la requête');
                    $nb_inscrits = mysqli_num_rows($select_inscrits);
                ?>
                <h3><?php echo $nb_inscrits; ?></h3>
                <p>Nombre d'inscrits</p>
            </div>

            <div class="box">
                <?php
                    $select_messages = mysqli_query($con, "SELECT * FROM `message`")
                    or die('Echec de la requête');
                    $nb_messages = mysqli_num_rows($select_messages);
                ?>
                <h3><?php echo $nb_messages; ?></h3>
                <p>Nombre de messages</p>
            </div>

        </div>

    </section>

    <!-- admin tableau de bord fin -->

    <script src="js/admin_script.js"></script>

</body>

</html>