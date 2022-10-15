<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
}
?>

<header class="header">

    <div class="flex">

        <a href="admin_page.php" class="logo">Tableau<span> de bord</span></a>

        <nav class="navbar">
            <a href="home.php">Accueil</a>
            <a href="admin_annonce.php">Annonces</a>
            <a href="admin_users.php">Utilisateurs</a>
            <a href="admin_contact.php">Contact</a>
        </nav>

        <div class="icons">
            <div class="fa fa-bars" id="menu-btn"></div>
            <div class="fa fa-user" id="user-btn"></div>
        </div>

        <div class="account-box">
            <p>Utilisateur : <span><?php echo $_SESSION['admin_nom']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Se déconnecter</a>
        </div>

    </div>

</header>