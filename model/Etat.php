<?php
class Etat {
    //Au lieu de creer une classe qui va mapper la table etat qui
    //ne possede que 4 valeurs qui vont definir l'etat de la fiche
    //de frais. On peut creer 4 constantes .on peut la recuperer directement
    //en l'appliquant a la classe Etat.
    //Etat::CL
    const CL = "Saisie clôturée";
    const CR = "Fiche créée, saisie en cours";
    const RB = "Remboursée";
    const VA = "Validée et mise en paiement";
    
}
