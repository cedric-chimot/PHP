<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tableau</title>
</head>
<body>

    <?php

    $table = <<<table

        <table class="table table-bordered table striped">

        <h2>Tableau des employés</h2>

        <tr>
            <th>nom</th>
            <th>prenom</th>
            <th>age</th>
            <th>sexe</th>
            <th>profession</th>
        </tr>

        <tr>
            <td>Machin</td>
            <td>Toto</td>
            <td>25</td>
            <td>Homme</td>
            <td>Chomeur</td>
        </tr>

        <tr>
            <td>Mouton</td>
            <td>Heidi</td>
            <td>18</td>
            <td>Femme</td>
            <td>Etudiante</td>
        </tr>

        <tr>
            <td>Chimot</td>
            <td>Cedric</td>
            <td>20</td>
            <td>Homme</td>
            <td>Développeur</td>
        </tr>

        </table>

        table;

    echo $table . "\n";
    echo 'Ceci est un tableau';

?>
</body>
</html>