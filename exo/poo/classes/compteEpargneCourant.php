<?php

class CompteEpargneCourant extends CompteEpargne
{
    private $decouvert;

    /**
     * constructeur de compte courant
     * @param string $nom nom du titulaire
     * @param float $montant solde à l'ouverture
     * @param int $decouvert découvert autorisé
     * @return void
     */

    public function __construct(string $nom, float $montant, int $taux, int $decouvert)
    {
        //on transfère les informations nécessaires au constructeur de compte
        parent::__construct($nom, $montant, $taux);
        $this->decouvert = $decouvert;
    }

    public function getDecouvert():int 
    {
        return $this->decouvert;
    }

    public function setDecouvert(int $montant): self
    {
        if($montant >= 0){
            $this->decouvert = $montant;
        }
        return $this;
    }

    public function retirer(float $montant)
    {
        //on vérifie si le decouvert permet le retrait
        if($montant > 0 && $this->solde - $montant >= -$this->decouvert){
            $this->solde -= $montant;
        }else{
            echo 'Solde insuffisant';
        }
    }
}

?>