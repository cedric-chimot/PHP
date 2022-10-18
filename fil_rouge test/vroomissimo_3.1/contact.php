<?php

include 'config.php';

session_start();

$client_id = $_SESSION['client_id'];

if (!isset($client_id)) {
    header('location:login.php');
}

if(isset($_POST['envoyer'])) {

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = $_POST['telephone'];
    $msg = mysqli_real_escape_string($con, $_POST['message']);

    $select_message = mysqli_query($con, "SELECT * FROM `message`
    WHERE `nom` = '$nom' AND `email` = '$email' AND
    `telephone` = '$telephone' AND `message` = '$msg'")
    or die('Echec de la requête');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'Message déjà envoyé !';
    }else{
        mysqli_query($con, "INSERT INTO `message` (`client_id`, `nom`, `email`, `telephone`, `message`)
        VALUES ($client_id, '$nom', '$email', '$telephone', '$msg')")
        or die('Echec de la requête');
        $message[] = 'Message envoyé !';
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
    <title>Contact</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading_contact">
        <h3>Contactez-nous</h3>
        <p> <a href="home.php">Accueil</a> / Contact </p>
    </div>

    <section class="contact">

        <form method="post" action="">
            <h3>Votre message :</h3>
            <input type="text" name="nom" class="box" placeholder="entrer votre nom" required>
            <input type="text" name="email" class="box" placeholder="entrer votre email" required>
            <input type="number" name="telephone" class="box" placeholder="numéro de téléphone" required>
            <textarea name="message" class="box" placeholder="taper votre message"
            cols="30" rows="10"></textarea>
            <input type="submit" name="envoyer" class="btn" value="Envoyer">
        </form>

    </section>




    <?php include 'footer.php'; ?>

    <script src="js/script/script.js"></script>

</body>

</html>