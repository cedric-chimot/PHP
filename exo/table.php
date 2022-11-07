<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Tableau</title>
</head>

<body>

    <?php

    $tab = array("cedric", "theo", "halim", "greg", "anthony", "oceane");
    rsort($tab);

    echo "<pre>";
    print_r($tab);

    $count = count($tab);

    for ($x = 0; $x < $count; $x++) {
        echo "<pre>";
        echo $tab[$x];
    }
    ?>

</body>

</html>