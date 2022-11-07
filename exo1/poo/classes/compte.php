<?php

/**
 * Objet Compte Bancaire
 */

class Compte
{
    // Propriétés
    
    /**
     * Titulaire du compte
     *
     * @var string
     */
    public $titulaire;

    /**
     * Solde du compte
     *
     * @var float
     */
    public $solde;

    // Méthodes

    /**
     * constructeur du compte bancaire
     * 
     * @param string $nom Nom du titulaire
     * @param float $montant Montant du solde à l'ouverture du compte
     */

    public function __construct(string $nom, float $montant = 100)
    {
        //on attribue le nom à la propriété titulaire de l'instance créée
        $this->titulaire = $nom;

        //on attribue le montant à la propriété solde
        $this->solde = $montant;
    }

    /**
     * Déposer de l'argent sur le compte
     * 
     * @param float $montant Montant déposé
     * @return void
     */

    public function deposer(float $montant)
    {
        //on vérifie si le montant est positif
        if($montant > 0){
            $this->solde += $montant;
        }
    }

    /**
     * retourne une chaine de caractères affichant le solde
     *
     * @return string
     */
    public function voirSolde()
    {
        echo "Le solde du compte est de $this->solde euros. <br />";
        //autre méthode :
        //return "Le solde du compte est de $this->solde euros."
    }

    /**
     * retirer un montant du solde du compte
     *
     * @param float $montant Montant à retirer
     * @return void
     */
    public function retirer(float $montant)
    {
        //on vérifie le montant et le solde
        if ($montant > 0 && $this->solde >= $montant){
            $this->solde -= $montant;
        }else{
            echo "Montant invalide ou solde insuffisant <br />";
        }
    }

}