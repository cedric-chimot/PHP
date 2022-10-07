<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Connexion Mysql en PDO</title>
</head>

<body>

    <h1>Interrogation de la table carnet avec PDO</h1>

    <?php
    require("connect.php");
    $dsn = "mysql:dbname=" . base . ";host=" . server;
    try {
        $con = new PDO($dsn, utilisateur, mdp);
    } catch (PDOException $e) {
        printf("Echec de la connexion : %s\n", $e->getMessage());
        exit();
    }

    $sql = "SELECT * FROM carnet";
    if (!$con->query($sql)) echo "Pb d'accès au carnet";
    else {
    ?>
        <table class="table table-striped table-bordered" id="jolie">
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Naissance</th>
            </tr>
            <?php
            foreach ($con->query($sql) as $row)
                echo "<tr><td>" . $row['ID'] . "</td>
                      <td>" . $row['PRENOM'] . "</td>
                      <td>" . $row['NOM'] . "</td>
                      <td>" . $row['NAISSANCE'] . "</td></tr><br/>\n";
            ?>
        </table>
    <?php } ?>

</body>

</html>