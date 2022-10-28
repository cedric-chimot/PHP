<?php

//connexion à la base de données
include 'config.php';

//ouverture de la session
session_start();

$admin_id = $_SESSION['admin_id'];

//si la personne connectée n'est pas un admin, on la renvoie vers la page login
if (!isset($admin_id)) {
    header('location:login.php');
};

//paramétrage de la fonction 'update'
if(isset($_POST['update_membre'])){

    //déclaration des variables et lien vers les inputs avec '$_POST['nomInput']
    $update_membre_id = $_POST['update_membre_id'];
    $update_nom = $_POST['update_nom'];
    $update_adresse = $_POST['update_adresse'];
    $update_cp = $_POST['update_cp'];
    $update_ville = $_POST['update_ville'];
    $update_pays = $_POST['update_pays'];
    $update_email = $_POST['update_email'];

    //requête de MAJ de la table annonce en liant les colonnes avec les variables
    mysqli_query($con, "UPDATE `utilisateur` SET nom = '$update_nom', adresse = '$update_adresse',
        cp = '$update_cp', ville = '$update_ville', pays = '$update_pays', email = '$update_email'
        WHERE ID = '$update_membre_id'")
        or die('Echec de la requête');

    //renvoie vers la page d'administration des annonces
    header('location:admin_membres.php');

}

//paramétrage de la fonction 'delete'
if (isset($_GET['delete'])) {
    //création de la variable et association avec le bouton de suppression
    $delete_id = $_GET['delete'];
    //on va chercher dans la BDD l'utilisateur correspondant à l'ID
    mysqli_query($con, "DELETE FROM `utilisateur` WHERE id = '$delete_id'")
    //'or die' renvoie une notification d'erreur si la requête ne peut aboutir
        or die('Echec de la requête');
    //renvoie vers la page d'administration des utilisateurs
    header('location:admin_membres.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/admin.css">
    <title>Utilisateurs</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="users">

        <h1 class="titre">Comptes d'utilisateurs</h1>

        <div class="box-container">

            <?php
            //on va chercher dans la BDD tous les utilisateurs
                $select_users = mysqli_query($con, "SELECT * FROM `utilisateur`")
                    or die("Echec de la requête");
            // Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
                while ($fetch_users = mysqli_fetch_assoc($select_users)) {
                ?>
                <div class="box">
                    <p>Nom : <span><?php echo $fetch_users['nom']; ?></span></p>
                    <p>Adresse : <span><?php echo $fetch_users['adresse']; ?></span></p>
                    <p>CP : <span><?php echo $fetch_users['cp']; ?></span></p>
                    <p>Ville : <span><?php echo $fetch_users['ville']; ?></span></p>
                    <p>Pays : <span><?php echo $fetch_users['pays']; ?></span></p>
                    <p>Email : <span><?php echo $fetch_users['email']; ?></span></p>
                    <p>Type d'utilisateur :
                        <span style="color:
                            <?php if ($fetch_users['type_user'] == 'admin') {
                                echo 'var(--rouge)';
                            } else {
                                echo 'var(--violet)';
                            } ?>;"><?php echo $fetch_users['type_user']; ?>
                        </span>
                    </p>
                    <a href="admin_membres.php?update_membre=<?php echo $fetch_users['ID']; ?>" class="btn">Modifier</a>
                    <a href="admin_membres.php?delete=<?php echo $fetch_users['ID']; ?>"
                        class="delete-btn" onclick="return confirm('Voulez-vous supprimer cet utilisateur ?');">
                        Supprimer
                    </a>
                </div>
            <?php
            };
            ?>

        </div>

    </section>

    <section class="edit-membres-form">
        
        <div class="form">
            <?php
            if (isset($_GET['update_membre'])) {
                //on va chercher le bouton modifier
                $update_membre_id = $_GET['update_membre'];

                //on fait une requête en se connectant à la table 'annonce' et en le liant au numéro de l'annonce
                $update_query = mysqli_query($con, "SELECT * FROM `utilisateur` WHERE ID = '$update_membre_id'")
                    or die('Echec de la requête');
                if (mysqli_num_rows($update_query) > 0) {
                    while ($fetch_update = mysqli_fetch_assoc($update_query)) {
            ?>
                <!-- le formulaire de modification apparait à l'écran -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="update_membre_id" value="<?php echo $fetch_update['ID']; ?>">
                            <input type="text" name="update_nom" value="<?php echo $fetch_update['nom']; ?>" class="box" placeholder="nom" required>
                            <input type="text" name="update_adresse" value="<?php echo $fetch_update['adresse']; ?>" class="box" placeholder="adresse" required>
                            <input type="text" name="update_cp" value="<?php echo $fetch_update['cp']; ?>" class="box" placeholder="cp" required>
                            <input type="text" name="update_ville" value="<?php echo $fetch_update['ville']; ?>" class="box" placeholder="ville" required>
                            <input type="text" name="update_pays" value="<?php echo $fetch_update['pays']; ?>" class="box" placeholder="pays" required>
                            <input type="text" name="update_email" value="<?php echo $fetch_update['email']; ?>" class="box" placeholder="email" required>
                            <input type="submit" value="Modifier" name="update_membre" class="btn" onclick="return confirm('Fiche membre modifiée avec succès !')">
                            <input type="reset" value="Annuler" id="stop-update" class="delete-btn">
                        </form>
            <?php
                    }
                }
            } else {
                //sinon tant que l'on n'appuie pas sur le bouton 'update', le formulaire reste invisible
                echo '<script>document.querySelector(".edit-membres-form").style.display = "none";</script>';
            }
            ?>

        </div>

    </section>

    <script src="js/admin_script.js"></script>

</body>

</html>