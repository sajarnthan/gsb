<?php
//qui va realiser les operaitons CRUD sur la table LigneFraisHorsForfait
class DaoLigneFraisHorsForfait extends DaoConnexion {
	//on insere une ligne de frais hors forfait
	public function addLigneFraisHorsForfait(LigneFraisHorsForfait $ligneFraisHorsForfait) {
		//on recupere les propriétés de $ligneFraisHorsForfait grace aux getters
		$id = $ligneFraisHorsForfait->getId();
		$idVisiteur = $ligneFraisHorsForfait->getIdVisiteur();
		$mois = $ligneFraisHorsForfait->getMois();
		$libelle = $ligneFraisHorsForfait->getLibelle();
		$date = $ligneFraisHorsForfait->getDate();
		$montant = $ligneFraisHorsForfait->getMontant();
		//on va creer la requete pour inserer une ligne de frais hors forfait
		//on lui passe des parametres qui vont representer les valeurs a inserer. il est inutile de presciser les champs car on insere dans tous les champs de la page
		$request = "INSERT INTO LigneFraisHorsForfait (idVisiteur, mois, libelle, date, montant)
		VALUES (:idVisiteur, :mois, :libelle, :date, :montant)";
		// le bloc try catch va gerer les erreurs, si le bloc try ne s'execute pas correctement le bloc try va etre lancé et on pourra traiteer l'erreur
		try {
			//on prepare la requete
			$stmt = parent::$link->prepare($request);
			//on remplace les parametres par les valeurs de $ligneFraisForfait
			$stmt->bindParam(":idVisiteur", $idVisiteur);
			$stmt->bindParam(":mois", $mois);
			$stmt->bindParam(":libelle", $libelle);
			$stmt->bindParam(":date", $date);
			$stmt->bindParam(":montant", $montant);
			//on execute la requete
			$stmt->execute();
			//echo "la ligne de frais hors forfait a été ajoutée. ";
		} catch (Exception $e) {
			file_put_contents("log.txt","Erreur ! " . $e->getMessage());
			echo "Erreur ! " . $e->getMessage();
		}
	}

	
}