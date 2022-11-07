<?php

require_once 'db.php';
require_once 'util.php';

$db = new Database;
$util = new Util;

//ajouter un utilisateur
if (isset($_POST['add'])) {
    //test de la valeur des inputs avec la fonction de la page 'util.php'
    //par la sécurisation des données
    $prenom = $util->testInput($_POST['prenom']);
    $nom = $util->testInput($_POST['nom']);
    $email = $util->testInput($_POST['email']);
    $telephone = $util->testInput($_POST['telephone']);

    if ($db->insert($prenom, $nom, $email, $telephone)) {
        echo $util->showMessage('success', 'Utilisateur ajouté avec succès');
    } else {
        echo $util->showMessage('danger', 'Une erreur est survenue');
    }
}

//Requête Ajax fetch utilisateurs
if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if ($users) {
        foreach ($users as $row) {
            $output .=
            '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['prenom'] . '</td>
                <td>' . $row['nom'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['telephone'] . '</td>
                <td>
                    <a href="#" id="' . $row['id'] . '"
                        class="btn btn-success btn-sm rounded-pill py-0 editLink"
                        data-toggle="modal" data-target="#editUserModal">Modifier
                    </a>
                    <a href="#" id="' . $row['id'] . '" 
                        class="btn btn-danger btn-sm rounded-pill py-0">Supprimer
                    </a>
                </td>
            </tr>';
        }
        echo $output;
    } else {
        echo '<tr>
                <td colspan="6">Aucun utilisateur trouvé !</td>
              </tr>';
    }
}

//requête Ajax pour éditer les utilisateurs
if(isset($_GET['edit'])){
    $id = $_GET['id'];

    $user = $db->readOne($id);
    echo json_encode($user);
}

//requête Ajax pour update
if(isset($_POST['update'])){
    $id = $util->testInput($_POST['id']);
    $prenom = $util->testInput($_POST['prenom']);
    $nom = $util->testInput($_POST['nom']);
    $email = $util->testInput($_POST['email']);
    $telephone = $util->testInput($_POST['telephone']);

    if($db->update($id, $prenom, $nom, $email, $telephone)){
        echo $util->showMessage('success', 'Utilisateur modifié avec succès');
    } else {
        echo $util->showMessage('danger', 'Une erreur est survenue');
    }
}

?>