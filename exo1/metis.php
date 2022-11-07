<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Exo PHP mètis</title>
</head>

<body>

<?php

$jour = getdate();
echo 'En ce ' . $jour['mday'] . " " . $jour['month'] . " " . $jour['year'] .
    ', sur le serveur' . " " . $_SERVER['SERVER_NAME'] . ', il est ' .
    $jour['hours'] . 'h ' . $jour['minutes'] . 'm ' . $jour['seconds'] . 's.';

?>

<h2 class="mt-2 mb-3">Variables HTTP serveur(getenv())</h2>

<table class="table table-bordered mt-2">

    <tr>
        <th>Variable</th>
        <th>Valeur</th>
    </tr>

    <tr>
        <td>GATEWAY_INTERFACE</td>
        <td><?php echo getenv('GATEWAY_INTERFACE');?></td>
    </tr>

    <tr>
        <td>SERVER_NAME</td>
        <td><?php echo getenv('SERVER_NAME');?></td>
    </tr>

    <tr>
        <td>SERVER_SOFTWARE</td>
        <td><?php echo getenv('SERVER_SOFTWARE');?></td>
    </tr>

    <tr>
        <td>REQUEST_METHOD</td>
        <td><?php echo getenv('REQUEST_METHOD');?></td>
    </tr>

    <tr>
        <td>QUERY_STRING</td>
        <td><?php echo getenv('QUERY_STRING');?></td>
    </tr>

    <tr>
        <td>DOCUMENT_ROOT</td>
        <td><?php echo getenv('DOCUMENT_ROOT');?></td>
    </tr>

    <tr>
        <td>HTTP_ACCEPT</td>
        <td><?php echo getenv('HTTP_ACCEPT');?></td>
    </tr>

    <tr>
        <td>HTTP_ACCEPT_CHARSET</td>
        <td><?php echo getenv('HTTP_ACCEPT_CHARSET');?></td>
    </tr>

    <tr>
        <td>HTTP_ACCEPT_ENCODING</td>
        <td><?php echo getenv('HTTP_ACCEPT_ENCODING');?></td>
    </tr>

    <tr>
        <td>HTTP_ACCEPT_LANGUAGE</td>
        <td><?php echo getenv('HTTP_ACCEPT_LANGUAGE');?></td>
    </tr>

    <tr>
        <td>HTTP_CONNECTION</td>
        <td><?php echo getenv('HTTP_CONNECTION');?></td>
    </tr>

    <tr>
        <td>HTTP_HOST</td>
        <td><?php echo getenv('HTTP_HOST');?></td>
    </tr>

    <tr>
        <td>HTTP_REFERER</td>
        <td><?php echo getenv('HTTP_REFERER');?></td>
    </tr>

    <tr>
        <td>HTTP_USER_AGENT</td>
        <td><?php echo getenv('HTTP_USER_AGENT');?></td>
    </tr>

    <tr>
        <td>REMOTE_ADDR</td>
        <td><?php echo getenv('REMOTE_ADDR');?></td>
    </tr>

    <tr>
        <td>SCRIPT_FILENAME</td>
        <td><?php echo getenv('SCRIPT_FILENAME');?></td>
    </tr>

    <tr>
        <td>SERVER_ADMIN</td>
        <td><?php echo getenv('SERVER_ADMIN');?></td>
    </tr>

    <tr>
        <td>SERVER_PORT</td>
        <td><?php echo getenv('SERVER_PORT');?></td>
    </tr>

    <tr>
        <td>SERVER_SIGNATURE</td>
        <td><?php echo getenv('SERVER_SIGNATURE');?></td>
    </tr>

</table>


</body>

</html>



<!-- // // phpinfo();

//     $chaine = "ceci est une chaine de caractere";

//     // echo $chaine;

//     //afficher un caractere d'une chaine
//     // echo $chaine[10];

//     //modifier un caractere
//     // $chaine[0] = 'F';
//     // echo $chaine;

//     //extraire une partie de la chaine
//     var_dump (substr($chaine, 5, 13));

// for($i = 3; $i <= 7; $i++){
//     echo '<font size="' . $i . "\">Hello world !</font><br />\n";
// }

// $var = 'Hello world !';

//     echo "<font size ='3'>$var</font><br />\n";
//     echo "<font size ='4'>$var</font><br />\n";
//     echo "<font size ='5'>$var</font><br />\n";
//     echo "<font size ='6'>$var</font><br />\n";
//     echo "<font size ='7'>$var</font><br />\n";
//     -->