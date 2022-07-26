<?php
//je créé un objet DaoConnexion, qui va contenir les propriétés pour la connexion à la base de données

class DaoConnexion{
    //definition de mon serveur local
    private static $server = "mysql:host=localhost";

    //definition de ma base de données
    private static $db = "dbname=gsbfrais";

    //j'indique mon nom d'utilisateur 
    private static $user = "votre nom d'utilisateur";  
    
    //le mot de passe

    private static $pwd = "votre mot de passe";

    //definition de la connexion a la base de donnee
    protected static $link;

    //dans le constructeur  J'initialise la connexion a la base de donnee en utilisant l'objet PDO . L'objet PDO est plus sécurisé que mysqli car il me permet d'eviter les injections sql

    
    //comme les proprietes definis sont statiques pour y acceder j'écris DaoConnexion:: si elle n'avait pas ete statique j'aurais remplace DaoConnexion:: par $this->


    //protected signifie que les classes qui pourront acceder à mes proprietes sont les classes enfants c'est a dire celles qui hériteront de la classe DaoCOnnexion.

    public function __construct(){
        DaoConnexion::$link = new PDO(DaoConnexion::$server . ";" . DaoConnexion::$db, DaoConnexion::$user, DaoConnexion::$pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    
}