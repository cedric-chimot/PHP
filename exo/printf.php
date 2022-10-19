<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Printf</title>
</head>

<body>

<?php

    $euro = 6.55957;
    printf("%.2f FF <br />", $euro);
    $money1 = 68.75;
    $money2 = 54.35;
    $money = $money1 + $money2;

    echo "1 affichage sans printf : " . $money . "<br />";
    $monformat = sprintf("%01.2f", $money);

    echo "2 affichage avec printf : " . $monformat . "<br />";

    $year = "2002";
    $month = "4";
    $day = "5";
    $varDate = sprintf("%04d-%02d-%02d", $year, $month, $day);

    echo "3 affichage avec sprintf : " . $varDate . "<br />";

    $num = 5;
    $location = 'bananier';
    $action = 'mangent';
    $fruits = 'bananes';

    $format = 'Il y a %d singes dans le %s et ils %s des %s';
    echo sprintf($format, $num, $location, $action, $fruits);

?>

</body>

</html>