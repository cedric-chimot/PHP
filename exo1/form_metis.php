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

    <h1 class="mb-3">Un petit formulaire (pour commencer)</h1>

    <p class="mb-3">Merci de renseigner les informations suivantes</p>

    <form class="p-2">

        <label class="p-2">Votre nom : </label>
        <input type="text" name="nom" placeholder="nom" /><br />
        <label class="p-2">Votre âge : </label>
        <input type="text" name="nom" placeholder="age" /><br />
        <label class="p-2">Votre situation maritale : </label>
        <input type="radio" name="marit"/>
        <label for="marit">Marié</label>
        <input type="radio" name="marit"/>
        <label for="marit">Veuf(ve)</label>
        <input type="radio" name="marit"/>
        <label for="marit">Célibataire</label><br />
        <label class="p-2">Vos centres d'intérêt : </label>
        <input type="checkbox" name="internet"/>
        <label for="internet">Internet</label>
        <input type="checkbox" name="micro"/>
        <label for="micro_informatique">Micro-informatique</label>
        <input type="checkbox" name="jeux"/>
        <label for="jeux_video">Jeux vidéo</label><br />
        <input type="submit" name="envoyer" value="Envoyer" class="p-2" />
        <input type="reset" name="annuler" value="Annuler" class="p-2" />

    </form>

</html>