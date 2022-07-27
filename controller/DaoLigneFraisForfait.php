<?php
//qui va realiser les operaitons CRUD sur la table LigneFraisForfait
class DaoLigneFraisForfait extends DaoConnexion {
	//on insere une ligne de frais forfait
	public function addLigneFraisForfait(LigneFraisForfait $ligneFraisForfait) {
		//on recupere les propriétés de $ligneFraisForfait grace aux getters
		$idVisiteur = $ligneFraisForfait->getIdVisiteur();
		$mois = $ligneFraisForfait->getMois();
		$idFraisForfait = $ligneFraisForfait->getIdFraisForfait();
		$quantite = $ligneFraisForfait->getQuantite();
		//on va creer la requete pour inserer une ligne de frais forfait
		//on lui passe des parametres qui vont representer les valeurs a inserer. il est inutile de presciser les champs car on insere dans tous les champs de la page
		$request = "INSERT INTO LigneFraisForfait VALUES (:idVisiteur, :mois, :idFraisForfait, :quantite)";
		// le bmloc try catch va gerer les erreurs, si le bloc try ne s'execute pas correctement le bloc try va etre lancé et on pourra traiteer l'erreur
		try {

			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace les parametres par les valeurs de $ligneFraisForfait
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			$stmt->bindParam(":mois", $mois);
			$stmt->bindParam(":idFraisForfait", $idFraisForfait);
			$stmt->bindParam(":quantite", $quantite);
			//on execute la requete
			$stmt->execute();
			//echo "la ligne de frais forfait a été ajoutée. ";
		} catch (Exception $e) {
			file_put_contents("log.txt","Erreur ! " . $e->getMessage());
			echo "Erreur ! " . $e->getMessage();
		}
	}

	
}