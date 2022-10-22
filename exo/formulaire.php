<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <title>Formulaire</title>
</head>

<body>

    <h1>Formulaire</h1>

    <form method="post" class="p-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nom: <input type="text" class="mb-3" name="fname"><br />
        Prenom: <input type="text" class="mb-3" name="prenom"><br />
        Age: <input type="text" class="mb-3" name="age"><br />
        Profession: <input type="text" class="mb-3" name="profession"><br />
        <input type="submit" value="Executer" class="btn btn-success"><br /><br />
    </form>

    <?php

    $name = $_POST['fname'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $profession = $_POST['profession'];

    switch ($_SERVER["REQUEST_METHOD"] == "POST") {

        case "name":
            if (empty($name)) {
                echo "Veuillez renseigner votre nom !";
                break;
            }

        case 'prenom':
            if (empty($prenom)) {
                echo "Veuillez renseigner votre prénom !";
                break;
            }

        case 'age':
            if (empty($age)) {
                echo "Veuillez renseigner votre âge !";
                break;
            }

        case 'profession':
            if (empty($profession)) {
                echo "Veuillez renseigner votre profession !";
                break;
            }

        case 'all':
            echo "Je m'appelle " . $name . "\n";
            echo $prenom . ", " . "\n";
            switch ($_SERVER["REQUEST_METHOD"] == "POST"){
                case '20':
                    if ($age >= 20 && $age < 30) {
                        echo "j'ai la vingtaine" . "\n";
                        echo "et dans la vie je suis " . $profession . ".";
                    break;
                }
                case '30':
                    if ($age >= 30 && $age < 40) {
                        echo "je suis trentenaire" . "\n";
                        echo "et dans la vie je suis " . $profession . ".";
                    break;
                }
                case '40':
                    if ($age >= 40 && $age < 50) {
                        echo "je suis quarantenaire" . "\n";
                        echo "et dans la vie je suis " . $profession . ".";
                    break;
                }
                case '50':
                    if ($age >= 50) {
                        echo "je suis cinquantenaire" . "\n";
                        echo "et dans la vie je suis " . $profession . ".";
                    break;
                } 
            }
    }

    ?>

    <!-- // if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //     $name = $_POST['fname'];
    //     $prenom = $_POST['prenom'];
    //     $age = $_POST['age'];
    //     $profession = $_POST['profession'];

    //     if (empty($name) or (empty($prenom)) or (empty($age)) or (empty($profession))) {
    //         echo "Le formulaire est incomplet";
    //     } else {
    //         echo "Je m'appelle " . $name . "\n";
    //         echo $prenom . ", " . "\n";
    //         if ($age >= 20){
    //             echo "j'ai la vingtaine" . "\n";
    //         }elseif ($age >= 30){
    //             echo "je suis trentenaire" . "\n";
    //         }elseif ($age >= 40){
    //             echo "je suis quarantenaire" . "\n";
    //         }else{
    //             echo "je suis cinquantenaire" . "\n";
    //         }
    //         echo "et dans la vie je suis " . $profession . ".";
    //     }
    // } -->



</body>

</html>