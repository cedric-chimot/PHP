<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Tableau</title>
</head>
<body>

    <?php

    $table = <<<table

        <table class="table table-bordered table striped">

        <h2>Tableau des employés</h2>

        <tr>
            <th>nom</th>
            <th>notes</th>
        </tr>

        <tr>
            <td>Cedric</td>
            <td>15</td>
        </tr>

        <tr>
            <td>Oceane</td>
            <td>15</td>
        </tr>

        <tr>
            <td>Theo</td>
            <td>15</td>
        </tr>

        <tr>
            <td>Jimmy</td>
            <td>15</td>
        </tr>

        </table>

        table;

    echo $table . "\n";

?>
</body>
</html>