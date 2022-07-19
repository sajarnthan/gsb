<?php
//Une classe est un modéle de donnée dans lesquelles on définit des proprietes
//qui sont des données qui peuvent etre de type numerique ou caractere
//on definit egalement les methodes qui vont permettre de traiter ces proprietes
class Visiteur
{
	//les proprietes de la classe qui sont private ce qui interdit d'y acceder
	//directement on dit que l'on realise l'encapsulation
    private $_id;
    private $_nom;
    private $_prenom;
    private $_login;
    private $_mdp;
    private $_adresse;
    private $_cp;
    private $_ville;
    private $_dateEmbauche; 
    //le constructeur d'une classe est une methode qui permet d'initialiser
    //les proprietes d'un objet en utilisant l'operateur d'instanciation new
    //ce constructeur contient des variables qui doivent etre du type 
    //des proprietes
    public function __construct(string $id, string $nom, string $prenom, string $login, string $mdp, string $adresse, string $cp, string $ville, string $dateEmbauche)
    {
    	//$this: represente l'objet instancie a partir de cette classe, on 
    	//initialise ici les proprietes de l'objet de type visiteur.
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_login = $login;
        $this->_mdp = $mdp;
        $this->_adresse = $adresse;
        $this->_cp = $cp;
        $this->_ville = $ville;
        $this->_dateEmbauche = $dateEmbauche;
    } 
    //Ici on définit les getters c'est a dire les methodes qui vont permettre
    //d'acceder aux differentes proprietes, un getter ne fait que retourner 
    //une des proprietes de l'objet
    public function getId()
    {
        return $this->_id;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function getPrenom()
    {
        return $this->_prenom;
    }
    public function getLogin()
    {
        return $this->_login;
    }

    public function getMdp()
    {
        return $this->_mdp;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }
    public function getCp()
    {
        return $this->_cp;
    }
    public function getVille()
    {
        return $this->_ville;
    }
    public function getDateEmbauche()
    {
        return $this->_dateEmbauche;
    }
    //ici on définit les setters , c'est a dire les methodes qui vont initialiser les proprietes de l'objet. Ces methodes prennent un parametres qui va initialiser la proprietes
    public function setId($_id)
    {
        $this->_id = $_id;
    }

    public function setNom($_nom)
    {
        $this->_nom = $_nom;
    }

    public function setPrenom($_prenom)
    {
        $this->_prenom = $_prenom;
    }

    public function setLogin($_login)
    {
        $this->_login = $_login;
    }

    public function setMdp($_mdp)
    {
        $this->_mdp = $_mdp;
    }

    public function setAdresse($_adresse)
    {
        $this->_adresse = $_adresse;
    }

    public function setCp($_cp)
    {
        $this->_cp = $_cp;
    }

    public function setVille($_ville)
    {
        $this->_ville = $_ville;
    }

    public function setDateEmbauche($_dateEmbauche)
    {
        $this->_dateEmbauche = $_dateEmbauche;
    }

   
   
    
    
}