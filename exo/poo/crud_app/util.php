<?php

class Util{

    //test de la valeur de l'input
    public function testInput($data) {

        //'trim' : Efface les espaces blancs au début et à la fin d'une chaine
        $data = trim($data);
        //'stripslashes' : Supprime les antislashs d'une chaîne
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //'strip_tags' : Supprime les balises HTML et PHP d'une chaîne
        $data = strip_tags($data);

        return $data;

    }

    //Faire apparaitre les messages de réussite et d'erreur
    public function showMessage($type, $message){
        return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
                    <strong>'.$message.'</strong>
                    <button type="button" class="btn-close"
                    data-dismiss="alert" aria-label="Close"></button>
                </div>';
    }

}

?>