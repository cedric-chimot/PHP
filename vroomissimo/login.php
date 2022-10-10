<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $select_user = mysqli_query($con, "SELECT * FROM `utilisateur`
                                       WHERE Email = '$email' AND Password = '$password'")
        or die('Echec de la requête');

    if (mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_assoc($select_user);

        if ($row['Type_user'] == 'admin') {
            $_SESSION['admin_nom'] = $row['Nom'];
            $_SESSION['admin_email'] = $row['Email'];
            $_SESSION['admin_id'] = $row['ID'];
            header('location:admin_page.php');
        } elseif ($row['Type_user'] == 'client') {
            $_SESSION['client_nom'] = $row['Nom'];
            $_SESSION['client_email'] = $row['Email'];
            $_SESSION['client_id'] = $row['ID'];
            header('location:home.php');
        }
    } else {
        $message[] = 'Email ou mot de passe incorrect';
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
    <title>Se connecter</title>
</head>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
            <div class="message">
                <span>' . $message . '</span>
                <i class="fa fa-times" onclick="this.parentElement.remove();"></i>
            </div>
        ';
        }
    }

    ?>

    <div class="form-container">

        <form action="" method="post">
            <h3>Se connecter</h3>
            <input type="email" name="email" placeholder="Email" class="box" required>
            <input type="password" name="password" placeholder="Saisissez votre mot de passe" class="box" required>
            <input type="submit" name="submit" value="Se connecter" class="btn">
            <button class="delete-btn"><a href="home.php">Annuler</a></button>
            <p>Vous n'êtes pas encore inscrit ? <a href="inscrire.php">S'inscrire</a></p>
        </form>

    </div>


</body>

</html>