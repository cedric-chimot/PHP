<?php

class Personne{
    //propriétés
    private const PAS_DE_SOCIETE = '?';    //constante de classe
    private $nom;                          //prpriété ou variable d'objet
    private $societe;
    private static $effectif = 0;          //variable de classe


    //constructeur

    /**
     * construit l'objet
     *
     * @param string $nom
     * @param string $societe
     */

    public function __construct(
        string $nom,
        string $societe = self::PAS_DE_SOCIETE)
    {
        $this->nom = strToUpper($nom);
        $this->societe = "$societe";
        self::$effectif++;
    }

    //accesseurs "getters" et "setters"

    /**
     * consultation de la societe
     * @return string
     */

    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * modification de la societe
     * @return void
     */

    public function setSociete(string $societe)
    {
        if($this->estSalarie()){
            echo "ERREUR - Vous devez d'abord quitter votre societe";
            return;
        }

        if($this->validerSociete($societe)){
            $this->societe = $societe;
            echo "OK\n";
        }else{
            echo "ERREUR - Nom de société refusé(30 caractères max en majuscule).\n";
        }
    }

    /**
     * affiche les infos de la personne
     * 
     * @return void
     */
    
    public function afficher()
    {
        echo $this->__toString();
    }
    
    /**
     * teste si la personne est salariée
     * @return bool
     */

    private function estSalarie() : bool
    {
        return $this->societe !== self::PAS_DE_SOCIETE;
    }

    /**
     * réinitialise la propriété avec la constante PAS_DE_SOCIETE
     * à condition d'être salarié
     * 
     * @return void
     */

    public function quitterSociete()
    {
        if($this->estSalarie()){
            $this->societe = self::PAS_DE_SOCIETE;
            echo "OK\n";
        }
        else{
            "ERREUR - Vous n'êtes pas salarié. \n";
        }
    }

    /**
     * valide la société
     * critères 30 caractères max et majuscule
     * 
     * @param string $societe
     * @return bool true si le paramètre correspond
     */

    private function validerSociete(string $societe) : bool
    {
        if(strlen($societe) > 30 || $societe !== strToUpper($societe))
            return false;

            else return true;
    }

    /**
     * renvoie la valeur de l'effectif
     * @return int
     */

    public static function getEffectif() : int
    {
        return self::$effectif;
    }

    /**
     * détermine comment l'objet doit réagir lorsqu'il est traité comme chaine de caractère
     * ex : echo $pierre;
     * 
     * @return string
     */

    public function __toString()
    {
        $message = "Je m'appelle " . $this->nom;

        if($this->estSalarie())
        {
            $message .= " et je travaille chez " . $this->societe . "\n";
        }
        else
        {
            $message .= " et je ne suis pas salarié.\n";
        }
        return $message;
    }

}

?>