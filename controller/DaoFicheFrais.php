<?php

//je vais réaliser ma fonction d'insertion de fiche de frais. 
//ma class DaoFicheFrais va hériter de la class DaoConnexion ce qui me permet d'accéder directement à la connexion à la base de données

class DaoFicheFrais extends DaoConnexion
{
    
    //on insere une fiche de frais, à notre table fichefrais. On prend un objet de type FicheFrais, que l'on va appeller $fichefrais

    public function addFicheFrais(FicheFrais $ficheFrais)
    {
        //on recupere les proprietes de $ficheFrais grace aux getters
        
        $idVisiteur = $ficheFrais->getIdVisiteur();
        $mois = $ficheFrais->getMois();
        $nbJustificatifs = $ficheFrais->getNbJustificatifs();
        $montantValide = $ficheFrais->getMontantValide();
        $dateModif = $ficheFrais->getDateModif();
        $idEtat = $ficheFrais->getIdEtat();
        
        //création de la requete pour inserer une fiche de frais on lui passe des parametres qui vont representer les valeurs a inserer. il est inutile ici de preciser les champs car on insere dans tous les champs de la table fichefrais



        $request = "INSERT INTO ficheFrais VALUES (:idVisiteur, :mois, :nbJustificatifs, :montantValide, :dateModif, :idEtat)";

        //nous allons passer nos valeurs dans la requête, les valeurs sont des paramètres qui vont représenter les valeurs à insérer. Je ne précise pas les champs de la table, car je vais insérer dans tout les champs de la table. 

        //le bloc try cacth va gerer les erreurs, si le bloc try
        //ne s'execute pas correctment le bloc catch va etre lance 
        //et on pourra traiter l'erreur

        try {
            //on prepare la requete
            //parent::$link me permet d'accéder à la base de données grâce à l'héritage

            $stmt = parent::$link->prepare($request);
            //on remplace les paramatres par les valeurs de $fichefrait
            $stmt->bindParam(":idVisiteur", $idVisiteur);
            $stmt->bindParam(":mois", $mois);
            $stmt->bindParam(":nbJustificatifs", $nbJustificatifs);
            $stmt->bindParam(":montantValide", $montantValide);
            $stmt->bindParam(":dateModif", $dateModif);
            $stmt->bindParam(":idEtat", $idEtat);

            //on execute la requete
            $stmt->execute();
            //echo "La fiche des frais a été ajouté. ";
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
    }
    
    
}