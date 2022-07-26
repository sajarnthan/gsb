<?php
//la classe DaoVisiteur etend la calsse DaoConnexion (heritage) donc DaoVisiteur est un classe enfant donc on peut utiliser les propriétés définies protected dans la calsse parent
class DaoVisiteur extends DaoConnexion
{

    public function insertVisiteur(Visiteur $visiteur){
        //1) On recupére les informations de l'objet visiteur
        $id=$visiteur->getId();
        $nom=$visiteur->getNom();
        $prenom=$visiteur->getPrenom();
        $login=$visiteur->getLogin();
        //on va insérer un visiteur avec un mot de passe crypté
        $mdp=password_hash($visiteur->getMdp(), PASSWORD_DEFAULT);
        $adresse=$visiteur->getAdresse();
        $cp=$visiteur->getCp();
        $ville=$visiteur->getVille();
        $dateEmbauche=$visiteur->getDateEmbauche();
        
        //2) On va creez la requete php / mysql
        //Les valeurs avec : représentent des paramétres qui
        //vont etre remplace par ($id,$nom,...) apres
        //qu'on les aient traité
        try {
        $req="insert into Visiteur (id,nom,prenom,login,mdp,adresse,cp,ville,dateEmbauche) values (:id,:nom,:prenom,:login,:mdp,:adresse,:cp,:ville,:dateEmbauche)";
        
        //3) On va remplacer les parametres par des valeurs
        //On prepare la requete, c'est a dire qu'on va utiliser une "requete prepare".stmt est une abreviation pour statement (instruction)
        
        $stmt=parent::$link->prepare($req);
        //On va associer a tous les parametres de la requete
        //prepare les valeurs a inserer : on injecte nos valeurs avec binParam
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':login',$login);
        $stmt->bindParam(':mdp',$mdp);
        $stmt->bindParam(':adresse',$adresse);
        $stmt->bindParam(':cp',$cp);
        $stmt->bindParam(':ville',$ville);
        $stmt->bindParam(':dateEmbauche',$dateEmbauche);
        //4) On va executer la requete
        $stmt->execute();
        echo "<script> alert('Inscription confirmé') </script>";
    } catch (Exception $e) {
        echo "Erreur ! ";
    }
                
        }
        


    public function checkLogin(string $login, string $mdp)
    {
        $request = "SELECT COUNT(*) AS nb FROM Visiteur WHERE login=:login AND mdp=:mdp";
        try {
            $stmt = parent::$link->prepare($request);
            $stmt->bindParam(":login", $login);
            $stmt->bindParam(":mdp", $mdp);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
        $line = $stmt->fetch();
        return $line["nb"];
    }

    // public function getInfosVisiteur(string $login, string $mdp)
    // {
    //     $request = "SELECT * FROM visiteur WHERE login=:login AND mdp=:mdp";
    //     try {
    //         $stmt = parent::$link->prepare($request);
    //         $stmt->bindParam(":login", $login);
    //         $stmt->bindParam(":mdp", $mdp);
    //         $stmt->execute();
    //     } catch (Exception $e) {
    //         echo "Erreur ! " . $e->getMessage();
    //     }
    //     $line = $stmt->fetch();
    //     $visiteur = null;
    //     if ($line != null) {
    //         $visiteur = new Visiteur($line["id"], $line["nom"], $line["prenom"], $line["login"], $line["mdp"], $line["adresse"], $line["cp"], $line["ville"], $line["dateEmbauche"]);
    //     }
    //     return $visiteur;
    // }
    public function getAllVisiteurs()
    {
        $request = "SELECT * FROM Visiteur";
        //On tente d'executer l'instruction avec le try, si cela se passe mal alors le catch est executée.
        try {
            //Avant d'executer une requete on la prepare en vue eventuellement de donner des valeurs a des parametres.
            $stmt = parent::$link->prepare($request);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
        //fetch permet de recupere la liste des visiteur (on va récuperer le premier visiteur)
        $line = $stmt->fetch();
        //On initialise la variable visiteurà null
        $visiteur = null;
        //On initialise un tableau pour récuperer les visiteurs
        $listev=array();
        //Tant qu'il y a des lignes visiteurs
        while ($line != null) {
            $visiteur = new Visiteur($line["id"], $line["nom"], $line["prenom"], $line["login"], $line["mdp"], $line["adresse"], $line["cp"], $line["ville"], $line["dateEmbauche"]);
            //j'ajoute le visiteur a l'array
                 $listev[]=$visiteur;
                 //je passe au suivant 
                 $line = $stmt->fetch();
        }
        //je renvoie la liste des visiteurs
        return $listev;
    }
 //on définie la fonction getInfosVisieur à laquelle on passe 2 parametre le login et le mode passe
   function getInfosVisiteur(string $login1, string $mdp1){
//On stock la requete permettant de recuperer la liste des visiteur a partir de la table Visiteur
     $request = "select * from  Visiteur";
//On tente d'executer les instruction compris dans le bloc try
//si il y une errue c'est le catch qui va executer le traitement
     try {
//parent représente la calsse DaoConnexion qui est défine après le mot cle extends (heritage)
//$link est défini protected cela signifie qu'ont peut l'utiliser dans les classes enfants. 
//Deplus $link est static donc on fait appel à cette variable avec ::
//parend::$link represente la connexion à la base de donnée
//ici on utilise la méthode prépare de php pour preparer la requete avant de l'exeucter 
//au cas oou il y a des parametres
            $stmt = parent::$link->prepare($request);
//Elle execute la requete preparee
            $stmt->execute();
//catch est un bloc qui est executé si le bloc try à une erreur
//catch recupere un objet $e de type Exception
        } catch (Exception $e) {
//elle affiche le message d'erreur
            echo "Erreur ! " . $e->getMessage();
        }
//dans $stmt on a la liste des visiteurs, donc on commence par lire le premier visiteur (stmt->()) 
//et on le stock dans un tableau associatif qui est $line
     $line = $stmt->fetch();
//On initialise une variable $user a null
     $user=null;
 //On teste que $line contient bien un visiteur
     while($line != null)    {
//on récupère le loggin et le password du visiteur stocke dans le $line
            $login=$line['login'];
            $password= $line['mdp'];
//Je teste si le mot de passe saisi $mdp1 est egal au mot de passe crypte alors $is_match est egal à true sinon a false
//Je teste si le mot de passe saisi est egal au mot de passe crypte
            $is_match = password_verify($mdp1, $password);
//si le mot de passe saisi et le login sont egale au mot de passe cryptée dans la bases de donnée 
//et au login dans la base de donnée alors on récupère le user
            if (($is_match) && $login1==$login) {
//On instancie la classe  Visiteur avec les données du visiteur 
//qui correespond au login et au password saisi que l'on stockes dans $user
                $user = new Visiteur($line["id"], $line["nom"], $line["prenom"], $line["login"], $mdp1, $line["adresse"], $line["cp"], $line["ville"], $line["dateEmbauche"]);
            }
//On lit le visieur suivant que l'on stock dans la variable $line
            $line = $stmt->fetch();
 //On retourne à l'instruction  while($line != null)    
        }
// Si $line==nul on retourne le $user
        return $user;
}

 //On supprime un visiteur 
 public function deleteVisiteur($id){
    
    //On supprime un visiteur
   $request = "delete from Visiteur WHERE id=:id";
   
   try {
       //on prepare la requete
       $stmt = parent::$link->prepare($request);
       
       $stmt->bindParam(":id", $id);
     
       //on execute la requete
       $stmt->execute();

   } catch (Exception $e) {
       echo "Erreur ! " . $e->getMessage();
   }
}
}
