<?php

include 'config.php';

session_start();

$client_id = $_SESSION['client_id'];

if (!isset($client_id)) {
    header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>A propos</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>A propos</h3>
        <p> <a href="home.php">Accueil</a> / A propos </p>
    </div>

    <section class="a_propos">

        <div class="flex">

            <div class="image">
                <img src="image/S0-modele--audi-q2.jpg"alt="">
            </div>

            <div class="content">
                <h3>Pourquoi nous faire confiance ?</h3>
                <p>Vroomissimo est une communauté créée par des passionnés pour des passionnés.
                    Vous aimez les belles voitures, vous êtes au bon endroit !
                </p>
                <p>Vendeur professionnels, nous sommes là pour vous conseiller et vous aider à faire
                    le meilleur choix possible. N'hésitez pas à faire appel à nos services.</p>
                <a href="contact.php" class="btn">Contactez-nous</a>
            </div>

        </div>

    </section>

    <section class="reviews">

        <h1 class="titre">Nos clients nous recommandent</h1>

        <div class="box-container">

            <div class="box">
                <img src="image/images_clients/2019-03-27.jpg">
                <p>Meilleur site de vente de voiture !!!
                    Service de qualité et livraison rapide.
                    Au top Vroomissimo.
                </p>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h3>Tony "Iron Man"</h3>
            </div>

            <div class="box">
                <img src="image/images_clients/pic-2.png">
                <p>Maintenant je me la joue belle-gosse en Ferrari, trop la classe.
                    Merci Vroomissimo !</p>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-alt"></i>
                </div>
                <h3>Heidi, descendue de la montagne</h3>
            </div>

            <div class="box">
                <img src="image/images_clients/pic-1.png">
                <p>Top tendance Vroomissimo, THE best site EVER LOL.
                    Je vous kiffe les loulous :)</p>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h3>Alain Fluenceur</h3>
            </div>

            <div class="box">
                <img src="image/images_clients/pic-4.png">
                <p>J'étais déjà belle avant, je le suis encore plus depuis que
                    je roule en Audi.
                </p>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-alt"></i>
                </div>
                <h3>Lulu d'Honolulu</h3>
            </div>

            <div class="box">
                <img src="image/images_clients/cedric_samus avatar.png">
                <p>J'ai échangé mon vaisseau spatial contre une BMW,
                    depuis le pirate de la route c'est moi.
                </p>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h3>Samus A.</h3>
            </div>
        </div>

    </section>




    <?php include 'footer.php'; ?>

    <script src="js/script/script.js"></script>

</body>

</html>