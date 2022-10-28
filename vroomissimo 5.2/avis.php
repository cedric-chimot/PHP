<?php

//connexion à la base de données
include 'admin/admins/config.php';

//ouverture de la session
session_start();

$client_id = $_SESSION['client_id'];
$vendeur_id = $_SESSION['vendeur_id'];

//si la personne n'est pas connectée, on la renvoie vers la page login
if (!isset($client_id)) {
    header('location:login.php');
};

//paramétrage de la fonction 'ajout'
if (isset($_POST['ajout_avis'])) {

    $nom_vendeur = mysqli_real_escape_string($con, $_POST['nom_vendeur']);
    $nom_client = mysqli_real_escape_string($con, $_POST['nom_client']);
    $note = mysqli_real_escape_string($con, $_POST['note']);
    $avis = mysqli_real_escape_string($con, $_POST['avis']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];                                     //"tmp_name" = temporary name
    $image_folder = 'image/' . $image;

    //on va chercher dans la BDD la table 'avis' par rapport à l'id du client
    $select_avis = mysqli_query($con, "SELECT id FROM `avis` WHERE client_id = '$client_id'")
    //'or exit' Affiche un message et termine le script courant
        or exit('Echec de la requête');

    //Création d'une variable pour vérifier si le numéro d'avis existe déjà dans la BDD
    if (mysqli_num_rows($select_avis) > 0) {
        //si oui, envoie d'un message d'erreur
        $message[] = 'Vous avez déjà donner votre avis !';
    } else {
        //sinon, connexion à la BDD et insertion des données de l'avis à l'aide d'une requête
        $ajout_avis = mysqli_query($con, "INSERT INTO `avis`(idvendeur, client_id, nom_vendeur, nom_client, note, avis, image)
            VALUES('$vendeur_id', '$client_id', '$nom_vendeur', '$nom_client', '$note', '$avis', '$image')")
            or exit('Echec de la requête');

        //vérification de la taile de l'image au moment de l'insertion et envoie d'un message d'erreur si elle est trop grande
        if ($ajout_avis) {
            if ($image_size > 2000000) {
                $message[] = "La taille de l'image est trop grande !";
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Commentaire ajoutée avec succès !';
            }
        } else {
            $message[] = "Votre commentaire n'a pas pu être ajouté";
        }
    }
}

//paramétrage de la fonction 'delete'
if (isset($_GET['delete'])) {
    //association du bouton 'delete' avec l'ID du message
    $delete_id = $_GET['delete'];
    //requête de suppression avec lien vers la table 'message'
    mysqli_query($con, "DELETE FROM `avis` WHERE id = '$delete_id'")
    //'or die' renvoie une notification d'erreur si la requête ne peut aboutir
        or die('Echec de la requête');
    //renvoie vers la liste des messages
    header('location:vendeur_contact.php');
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
    <title>Page d'accueil</title>
</head>

<body>

    <!-- Inclure le header commun aux pages du site -->
    <?php include 'header.php'; ?>

    <div class="recap_avis">
        <h3>Tous vos commentaires</h3>
        <p> <a href="home.php">Accueil</a> / Commentaires </p>
    </div>

    <section class="ajout-review">

        <h1 class="titre">Donner votre avis</h1>

        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/jpg, image/jpeg,image/png" class="box" required>
            <input type="text" name="nom_client" class="box" placeholder="votre nom" required>
            <input type="text" name="nom_vendeur" class="box" placeholder="vendeur" required>
            <input type="text" name="note" class="box" placeholder="votre note" required>
            <textarea name="avis" class="box" placeholder="votre avis" cols="30" rows="10" required></textarea>
            <input type="submit" value="Ajouter un avis" name="ajout_avis" class="btn">
        </form>

    </section>

    <section class="afficher_avis">

        <div class="box-container">

        <h3 class="titre">Tous vos commentaires</h3>

            <?php

            //requête pour afficher la totalité des données de la table avis
            $select_avis = mysqli_query($con, "SELECT * FROM `avis`
                WHERE idvendeur = '$vendeur_id'")
                or exit('Echec de la requête');
            // Retourne le nombre de lignes dans le jeu de résultats
            if (mysqli_num_rows($select_avis) > 0) {
                // Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
                while ($fetch_avis = mysqli_fetch_assoc($select_avis)) {
            ?>
                    <!-- S'il existe un avis, on affiche les informations correspondantes -->
                    <div class="box">
                        <img src="image/<?php echo $fetch_avis['image']; ?>" alt="">
                        <div class="vendeur"><span>Vendeur : </span><?php echo $fetch_avis['nom_vendeur']; ?></div>
                        <div class="note"><span>Note : </span><?php echo $fetch_avis['note']; ?></div>
                        <div class="avis"><span>Avis : </span><?php echo $fetch_avis['avis']; ?></div>
                        <a href="avis.php?delete=<?php echo $fetch_avis['id']; ?>"
                            class="delete-btn" onclick="return confirm('Voulez-vous supprimer ce commentaire ?');">Supprimer
                        </a>
                    </div>
            <?php
                }
            } else {
                //Sinon la phrase suivante s'affiche
                echo '<p class="vide">Aucun avis publié</p>';
            }

            ?>

        </div>

    </section>


    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>