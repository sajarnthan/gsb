<?php

class LigneFraisHorsForfait 
{
    //Cette propriete sera en autoincrement dans la base de donnee
    //donc on ne l'initialise pas dans le constructeur
    private $_id;
    private $_idVisiteur;
    private $_mois;
    private $_libelle;
    private $_date;
    private $_montant;
    public function __construct(string $idVisiteur, string $mois, string $libelle, string $date, float $montant)
    {
        $this->_idVisiteur = $idVisiteur;
        $this->_mois = $mois;
        $this->_libelle = $libelle;
        $this->_date = $date;
        $this->_montant = $montant;
    }
    public function getId()
    {
        return $this->_id;
    }
    public function getIdVisiteur()
    {
        return $this->_idVisiteur;
    }
    public function getMois()
    {
        return $this->_mois;
    }
    public function getLibelle()
    {
        return $this->_libelle;
    }
    public function getDate()
    {
        return $this->_date;
    }
    public function getMontant()
    {
        return $this->_montant;
    }
    public function setId($_id)
    {
        $this->_id = $_id;
    }
    public function setIdVisiteur($_idVisiteur)
    {
        $this->_idVisiteur = $_idVisiteur;
    }
    public function setMois($_mois)
    {
        $this->_mois = $_mois;
    }
    public function setLibelle($_libelle)
    {
        $this->_libelle = $_libelle;
    }
    public function setDate($_date)
    {
        $this->_date = $_date;
    }
    public function setMontant($_montant)
    {
        $this->_montant = $_montant;
    }
     
}