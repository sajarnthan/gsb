<?php

class LigneFraisForfait  
{
    private $_idVisiteur;
    private $_mois;
    private $_idFraisForfait;
    private $_quantite;
    public function __construct(string $idVisiteur, string $mois, string $idFraisForfait, int $quantite)
    {
        $this->_idVisiteur = $idVisiteur;
        $this->_mois = $mois;
        $this->_idFraisForfait = $idFraisForfait;
        $this->_quantite = $quantite;
    }
    public function getIdVisiteur()
    {
        return $this->_idVisiteur;
    }
    public function getMois()
    {
        return $this->_mois;
    }
    public function getIdFraisForfait()
    {
        return $this->_idFraisForfait;
    }
    public function getQuantite()
    {
        return $this->_quantite;
    }
    public function setIdVisiteur($_idVisiteur)
    {
        $this->_idVisiteur = $_idVisiteur;
    }
    public function setMois($_mois)
    {
        $this->_mois = $_mois;
    }
    public function setIdFraisForfait($_idFraisForfait)
    {
        $this->_idFraisForfait = $_idFraisForfait;
    }
    public function setQuantite($_quantite)
    {
        $this->_quantite = $_quantite;
    }

   
}