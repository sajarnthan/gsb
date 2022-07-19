<?php

class FraisForfait
{
	 //on definit 4 constante qui sont des tableaux associatifs
	//car la table fiche frais ne contient que 4 valeurs
    const ETP = array(
        "libelle" => "Forfait Etape",
        "montant" => 110.00
    );
    const KM = array(
        "libelle" => "Frais Kilométrique",
        "montant" => 0.62
    );
    const NUI = array(
        "libelle" => "Nuitée Hôtel",
        "montant" => 80.00
    );
    const REP = array(
        "libelle" => "Repas Restaurant",
        "montant" => 25.00
    );
}
