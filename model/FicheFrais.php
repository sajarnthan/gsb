<?php

//Je créé une table qui va me permettre de disposer d'un modèle de données pour table FicheFrais. Je vais definir les propriétés dont je vais avoir besoin

//Pour accéder à ces propriétés nous devons avoir des méthodes pour le traitement des propriétés

//Je définis ces propriétés private, ce qui interdit l'accès direct aux propriétés, je réalise l'encapsulation. L'encapsulation definit les propriétés en private, pour interdire l'accés à partir d'autres "class"

class FicheFrais 
{
    private $_idVisiteur;
    private $_mois;
    private $_nbJustificatifs;
    private $_montantValide;
    private $_dateModif;
    private $_idEtat; 
    
    public function __construct(string $idVisiteur, string $mois, int $nbJustificatifs, float $montantValide, string $dateModif, string $idEtat)
    {
        $this->_idVisiteur = $idVisiteur;
        $this->_mois = $mois;
        $this->_nbJustificatifs = $nbJustificatifs;
        $this->_montantValide = $montantValide;
        $this->_dateModif = $dateModif;
        $this->_idEtat = $idEtat;
    }   
    public function getIdVisiteur()
    {
        return $this->_idVisiteur;
    }
    public function getMois()
    {
        return $this->_mois;
    }
    public function getNbJustificatifs()
    {
        return $this->_nbJustificatifs;
    }
    public function getMontantValide()
    {
        return $this->_montantValide;
    }
    public function getDateModif()
    {
        return $this->_dateModif;
    }
    public function getIdEtat()
    {
        return $this->_idEtat;
    }
    public function setIdVisiteur($_idVisiteur)
    {
        $this->_idVisiteur = $_idVisiteur;
    }
    public function setMois($_mois)
    {
        $this->_mois = $_mois;
    }
    public function setNbJustificatifs($_nbJustificatifs)
    {
        $this->_nbJustificatifs = $_nbJustificatifs;
    }
    public function setMontantValide($_montantValide)
    {
        $this->_montantValide = $_montantValide;
    }
    public function setDateModif($_dateModif)
    {
        $this->_dateModif = $_dateModif;
    }
    public function setIdEtat($_idEtat)
    {
        $this->_idEtat = $_idEtat;
    }

         
}
