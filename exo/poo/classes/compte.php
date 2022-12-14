<?php

/**
 * Objet Compte Bancaire
 */

abstract class Compte
{
    // Propriétés
    
    /**
     * Titulaire du compte
     *
     * @var string
     */
    protected $titulaire;

    /**
     * Solde du compte
     *
     * @var float
     */
    protected float $solde;

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
     * méthode magique pour la conversion en chaine de caractères
     * @return string
     */

    public function __toString()
    {
        return "Vous visualisez le compte de {$this->titulaire}, le solde est de {$this->solde} €.";
    }

    //accesseurs
    /**
     * Getter de titulaire - retourne la valeur du titulaire du compte
     * @return string
     */
    public function getTitulaire() : string
    {
        return $this->titulaire;
    }

    /**
     * modifie le nom du titulaire et retourne l'objet
     * @param string $nom nom du titulaire
     * @return Compte comppte bancaire
     */

    public function setTitulaire(string $nom): self
    {
        //on vérifie s'il y a un titulaire
        if($nom != ""){
            $this->titulaire = $nom;
        }
        return $this;
    }

    /**
     * retourne le solde du compte
     * @return float solde du compte
     */

    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * modifie le solde du compte bancaire
     * @param float $montant montant du compte
     * @return Compte compte bancaire
     */

    public function setSolde(float $montant): self
    {
        if($montant >= 0){
            $this->solde = $montant;
        }
        return $this;
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