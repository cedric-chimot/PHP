<?php
/**
 * compte avec taux d'intérêts
 */
class CompteEpargne extends Compte
{
    /**
     * taux d'intérêts du compte
     * @var int
     */
    private $taux_interets;

    /**
     * constructeur du compte épargne
     * @param string $nom nom du titulaire
     * @param float $montant montant du solde
     * @param int $taux taux d'intérêts
     * return void
     */

    public function __construct(string $nom, float $montant, int $taux)
    {
        //on transfère les valeurs nécessares au constructeur parent
        parent::__construct($nom, $montant, $taux);

        $this->taux_interets = $taux;
    }

    /**
    * Get taux d'intérêts du compte
    * @var int
    */

    public function getTauxInterets(): int
    {
        return $this->taux_interets;
    }

    /**
     * set taux d'interets du compte
     * @param int $taux_interets taux d'interets du compte
     * @return self
     */

    public function setTauxInterets(int $taux_interets): self
    {
        if($taux_interets >=0){
            $this->taux_interets = $taux_interets;
        }
        return $this;
    }

    public function verserInterets(){
        $this->solde = $this->solde + ($this->solde * $this->taux_interets / 100);
    }
}

?>