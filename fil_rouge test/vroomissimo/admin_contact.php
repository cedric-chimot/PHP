<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM `message` WHERE id = '$delete_id'") or die('Echec de la requête');
    header('location:admin_contact.php');
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
    <title>Messages</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="messages">

        <h1 class="titre">Messages</h1>

        <div class="box-container">

            <?php
                $select_message = mysqli_query($con, "SELECT * FROM `message`")
                    or die("Echec de la requête");
                if(mysqli_num_rows($select_message) > 0){
                    while ($fetch_message = mysqli_fetch_assoc($select_message)) {
                
            ?>

            <div class="box">
                <p> Nom : <span><?php echo $fetch_message['nom']; ?></span></p>
                <p> Telephone : <span><?php echo $fetch_message['telephone']; ?></span></p>
                <p> Email : <span><?php echo $fetch_message['email']; ?></span></p>
                <p> Message : <span><?php echo $fetch_message['message']; ?></span></p>
                <a href="admin_contact.php?delete=<?php echo $fetch_message['id']; ?>" class="delete-btn" onclick="return confirm('Voulez-vous supprimer ce message ?');">Supprimer le message</a>
            </div>

            <?php
                };
            }else{
                echo "<p class='vide' style='color: var(--rouge);'>Vous n'avez pas encore de message</p>";
            }
            ?>

        </div>

    </section>


    <script src="js/admin_script.js"></script>

</body>

</html>