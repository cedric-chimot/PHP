<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['update_annonce'])) {

    $update_annonce_id = $_POST['update_annonce_id'];
    $update_modele = $_POST['update_modele'];
    $update_prix = $_POST['update_prix'];
    $update_km = $_POST['update_km'];
    $update_carburant = $_POST['update_carburant'];
    $update_etat = $_POST['update_etat'];
    $update_description = $_POST['update_description'];

mysqli_query($con, "UPDATE `annonce` SET modele = '$update_modele', prix = '$update_prix', km = '$update_km',
    carburant = '$update_carburant', etat = '$update_etat', description = '$update_description'
    WHERE id = '$update_annonce_id'")
    or die('Echec de la requête');

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'image/' . $update_image;
    $update_ancien_image = $_POST['update_ancien_image'];

if (!empty($update_image)) {
    if ($update_image_size > 2000000) {
        $message[] = "La taille de l'image est trop grande !";
    } else {
        mysqli_query($con, "UPDATE `annonce` SET image = '$update_image'
            WHERE id = '$update_annonce_id'")
            or die('Echec de la requête');
        move_uploaded_file($update_image_tmp_name, $update_folder);
        unlink('image/' . $update_ancien_image);
    }
}

header('location:admin_annonce.php');
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
    <title>Produits</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="edit-annonce-form">
        <div class="form">
            <?php
            if (isset($_GET['update_annonce'])) {
                $update_id = $_GET['update_annonce'];

                $update_query = mysqli_query($con, "SELECT * FROM `annonce` WHERE id = '$update_id'") or die('Echec de la requête');
                if (mysqli_num_rows($update_query) > 0) {
                    while ($fetch_update = mysqli_fetch_assoc($update_query)) {
            ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="update_annonce_id" value="<?php echo $fetch_update['id']; ?>">
                            <input type="hidden" name="update_ancien_image" value="<?php echo $fetch_update['image']; ?>">
                            <img src="image/<?php echo $fetch_update['image']; ?>" alt="">
                            <input type="text" name="update_modele" value="<?php echo $fetch_update['modele']; ?>" class="box" placeholder="modele" required>
                            <input type="text" name="update_prix" value="<?php echo $fetch_update['prix']; ?>" class="box" placeholder="prix" required>
                            <input type="text" name="update_km" value="<?php echo $fetch_update['km']; ?>" class="box" placeholder="kilometrage" required>
                            <input type="text" name="update_carburant" value="<?php echo $fetch_update['carburant']; ?>" class="box" placeholder="carburant" required>
                            <input type="text" name="update_etat" value="<?php echo $fetch_update['etat']; ?>" class="box" placeholder="etat" required>
                            <input type="text" name="update_description" value="<?php echo $fetch_update['description']; ?>" class="box" placeholder="description" required>
                            <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
                            <input type="submit" value="Modifier" name="update_annonce" class="btn">
                            <input type="reset" value="Annuler" id="stop-update" class="delete-btn">
                        </form>

            <?php
                    }
                }
            } else {
            }
            ?>
        </div>
    </section>


    <script src="js/admin_script.js"></script>

</body>

</html>