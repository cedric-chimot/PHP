<?php

class Voiture{

    private $immat;
    private $couleur;
    private $poids;
    private $puissance;
    private $capacite;
    private $niveau;
    private $places;
    private $assure;
    private $message;

    public function __construct(string $immat, string $couleur, int $poids, int $puissance, float $capacite,
        float $niveau, int $places, bool $assure, string $message)
    {
        $this->immat = $immat;
        $this->couleur = $couleur;
        $this->poids = $poids;
        $this->puissance = $puissance;
        $this->capacite = $capacite;
        $this->niveau = $niveau;
        $this->places = $places;
        $this->assure = $assure;
        $this->message = $message;
    }

    public function getImmat()
    {
        return $this->immat;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getpoids()
    {
        return $this->poids;
    }

    public function getPuissance()
    {
        return $this->puissance;
    }

    public function getCapacite()
    {
        return $this->capacite;
    }

    public function getNiveau()
    {
        return $this->niveau = 5;
    }

    public function getPlaces()
    {
        return $this->places;
    }

    public function getAssure() : bool
    {
        return $this->assure;
    }

    public function getMessage()
    {
        return $this->message = "Bienvenue dans votre nouveau véhicule !";
    }

    public function setNiveau(float $niveau) : self
    {
        if($niveau <= 5){
            return $this->message = "Niveau de carburant faible";
        }
        return $this;
    }

    public function setAssure(bool $assure) : self
    {
        if($assure == false){
            return $this->message = "Vous n'êtes pas assuré attention !!!";
        }else{
            return $this->message = "Vous êtes assuré";
        }
        return $this;
    }
}















// class Voiture
// {

//     public $marque;
//     public $modele;
//     public $couleur;
//     public $vin;
//     public $immat;

//     public function __construct(string $marque, string $modele, string $couleur, string $vin, string $immat)
//     {
//         $this->marque = $marque;
//         $this->modele = $modele;
//         $this->couleur = $couleur;
//         $this->vin = $vin;
//         $this->immat = $immat;
//     }

//     public function show()
//     {
//         echo "La voiture est de marque $this->marque et de modèle $this->modele. Elle est de couleur $this->couleur, à pour code VIN $this->vin et son immatriculation est $this->immat.";
//     }
// }
?>