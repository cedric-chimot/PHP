<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM `utilisateur` WHERE id = '$delete_id'") or die('Echec de la requête');
    header('location:admin_users.php');
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
    <title>Utilisateurs</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="users">

        <h1 class="titre">Comptes d'utilisateurs</h1>

        <div class="box-container">

            <?php
                $select_users = mysqli_query($con, "SELECT * FROM `utilisateur`")
                    or die("Echec de la requête");
                while ($fetch_users = mysqli_fetch_assoc($select_users)) {
                ?>
                <div class="box">
                    <p>Nom : <span><?php echo $fetch_users['nom']; ?></span></p>
                    <p>Adresse : <span><?php echo $fetch_users['adresse']; ?></span></p>
                    <p>CP : <span><?php echo $fetch_users['cp']; ?></span></p>
                    <p>Ville : <span><?php echo $fetch_users['ville']; ?></span></p>
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
                    <a href="admin_users.php?delete=<?php echo $fetch_users['ID']; ?>" class="delete-btn" onclick="return confirm('Voulez-vous supprimer cet utilisateur ?');">Supprimer l'utilisateur</a>
                </div>
            <?php
            };
            ?>

        </div>

    </section>



    <script src="js/admin_script.js"></script>

</body>

</html>