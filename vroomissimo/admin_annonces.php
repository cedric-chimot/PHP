<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['ajout_annonce'])) {

    $num_annonce = mysqli_real_escape_string($con, $_POST['num_annonce']);
    $marque = mysqli_real_escape_string($con, $_POST['marque']);
    $modele = mysqli_real_escape_string($con, $_POST['modele']);
    $prix = $_POST['prix'];
    $km = mysqli_real_escape_string($con, $_POST['km']);
    $circulation = mysqli_real_escape_string($con, $_POST['annee_circul']);
    $production = mysqli_real_escape_string($con, $_POST['annee_production']);
    $carburant = mysqli_real_escape_string($con, $_POST['carburant']);
    $carrosserie = mysqli_real_escape_string($con, $_POST['carrosserie']);
    $etat = mysqli_real_escape_string($con, $_POST['etat']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $vendeur = mysqli_real_escape_string($con, $_POST['vendeur']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];                                     //"tmp_name" = temporary name
    $image_folder = 'image/' . $image;

    $select_num_annonce = mysqli_query($con, "SELECT num_annonce FROM `annonce` WHERE num_annonce = '$num_annonce'")
        or die('Echec de la requête');

    if (mysqli_num_rows($select_num_annonce) > 0) {
        $message[] = 'Cette annonce existe déjà !';
    } else {
        $ajout_annonce = mysqli_query($con, "INSERT INTO `annonce`
        (num_annonce, marque, modele, prix, Km, annee_circul, annee_production, carburant, carrosserie, etat, description, vendeur, contact_vendeur, image)
        VALUES('$num_annonce', '$marque', '$modele', '$prix', '$km', '$circulation', '$production', '$carburant', '$carrosserie', '$etat', '$description', '$vendeur', '$contact', '$image')")
            or die('Echec de la requête');

        if ($ajout_annonce) {
            if ($image_size > 2000000) {
                $message[] = "La taille de l'image est trop grande !";
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Annonce ajoutée avec succès !';
            }
        } else {
            $message[] = "Votre annonce n'a pas pu être ajoutée";
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
    <link rel="stylesheet" href="admin_style.css">
    <title>Produits</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <!-- Début du CRUD produits -->

    <section class="ajout-annonce">

        <h1 class="titre">Annonces</h1>

        <form method="post" action="" enctype="multipart/form-data">
            <h3>Ajouter une annonce</h3>
            <input type="text" name="num_annonce" class="box" placeholder="numéro de l'annonce" required>
            <input type="text" name="marque" class="box" placeholder="entrer la marque du véhicule" required>
            <input type="text" name="modele" class="box" placeholder="entrer le modèle du véhicule" required>
            <input type="number" name="prix" class="box" placeholder="prix du produit" required>
            <input type="text" name="km" class="box" placeholder="kilométrage" required>
            <input type="text" name="annee_circul" class="box" placeholder="mise en circulation" required>
            <input type="text" name="annee_production" class="box" placeholder="année de production" required>
            <input type="text" name="carburant" class="box" placeholder="carburant" required>
            <input type="text" name="carrosserie" class="box" placeholder="carrosserie" required>
            <input type="text" name="etat" class="box" placeholder="etat" required>
            <input type="text" name="description" class="box" placeholder="description" required>
            <input type="text" name="vendeur" class="box" placeholder="vendeur" required>
            <input type="text" name="contact" class="box" placeholder="contact" required>
            <h2>Ajouter des photos</h2>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
            <input type="submit" value="Ajouter une annonce" name="ajout_annonce" class="btn">
            <a href="home.php" class="delete-btn">Annuler</a>
        </form>

    </section>

    <!-- Fin du CRUD produits -->

    <!-- Afficher les annonces -->

    <section class="afficher_annonces">

        <div class="box-container">

            <?php
            
                $select_annonces = mysqli_query($con, "SELECT * FROM `annonce`")
                or die('Echec de la requête');
                if(mysqli_num_rows($select_annonces) > 0){
                    while($fetch_annonces = mysqli_fetch_assoc($select_annonces)){
            ?>

            <div class="box">
                <img class="image" src="image/<?php echo $fetch_annonces['image'];?>" alt="">
                <div class="marque"><?php echo $fetch_annonces['marque'];?></div>
                <div class="modele"><?php echo $fetch_annonces['modele'];?></div>
                <div class="prix"><?php echo $fetch_annonces['prix'] ." €";?></div>
                <div class="km"><?php echo $fetch_annonces['Km'] ." km";?></div>
                <div class="carburant"><?php echo $fetch_annonces['carburant'];?></div>
                <div class="description"><?php echo $fetch_annonces['description'];?></div>
            </div>

            <?php
                }
            }else{
                echo '<p class="vide">Aucune annonce ajoutée</p>';
            }

            ?>

        </div>

    </section>

    <script src="admin_script.js"></script>

</body>

</html>