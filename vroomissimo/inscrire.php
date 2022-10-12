<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
    $cp = mysqli_real_escape_string($con, $_POST['cp']);
    $ville = mysqli_real_escape_string($con, $_POST['ville']);
    $pays = $_POST['pays'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));       //"Md5" calcul le hachage de la chaine de caractère
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];

    $select_user = mysqli_query($con, "SELECT * FROM `utilisateur`
                                       WHERE Email = '$email' AND Password = '$password'")
        or die('Echec de la requête');

    if (mysqli_num_rows($select_user) > 0) {
        $message[] = 'Utilisateur existant';
    } else {
        if ($password != $cpassword) {
            $message[] = 'Les mots de passe ne correspondent pas !';
        } else {
            mysqli_query($con, "INSERT INTO `utilisateur`(nom, adresse, cp, ville, pays, email, password, type_user)
                            VALUES ('$nom', '$adresse', '$cp', '$ville', '$pays', '$email', '$password', '$user_type')")
                or die('Echec de la requête');
            $message[] = 'Inscription réussie';
            header('location:login.php');
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
    <link rel="stylesheet" href="css/style.css">
    <title>S'inscrire</title>
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
            <h3>S'inscrire</h3>
            <input type="text" name="nom" placeholder="Nom" class="box" required>
            <input type="text" name="adresse" placeholder="Adresse" class="box" required>
            <input type="text" name="cp" placeholder="Code Postal" class="box" required>
            <input type="text" name="ville" placeholder="Ville" class="box" required>
            <select name="pays" class="box" required>
                <option value=""></option>
                <option value="France">France</option>
                <option value="Allemagne">Allemagne</option>
                <option value="Espagne">Espagne</option>
                <option value="Italie">Italie</option>
            </select>
            <input type="email" name="email" placeholder="Email" class="box" required>
            <input type="password" name="password" placeholder="Choisissez votre mot de passe" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirmer votre mot de passe" class="box" required>
            <select name="user_type" class="box" required>
                <option value=""></option>
                <option value="client">Client</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="S'inscrire" class="btn">
            <button class="delete-btn"><a href="home.php">Annuler</a></button>
            <p>Vous possédez déjà un compte ? <a href="login.php">Se connecter</a></p>
        </form>

    </div>


</body>

</html>