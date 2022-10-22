<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulaire</title>
</head>

<body>
</body>

    <h1 class="mb-3">Merci à vous, <?php echo $_GET('nom')?>.</h1>

    <p class="mb-3">Vous avez donc le bel âge de <?php echo $_GET('age')?> ans,
        et vous vous intéressez à <?php echo $_GET('interet')?>.
    </p>

    <p class="mb-3">Je m'empresse d'envoyer la requête : <?php echo $_GET('req')?>
        à notre base de données.
    </p>
    

</html>