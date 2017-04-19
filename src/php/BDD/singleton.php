<?php


final class singleton
{
    private static $PDOInstance = null;
    private static $dsn = null;
    // private static $username = null;
    private static $prenom = null;
    private static $nom = null;
    private static $password = null;
    private static $mail = null;
    private static $role = null;
    private static $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );


//construit un utilisateur
    private function __construct($dsn, $nom, $password)
    {
    	$this->dsn = $dsn;
    	$this->nom = $nom;
    	$this->password = $password;
    }


//connexion à la BDD	
    public static function getInsance()
    {
        if(is_null(self::$PDOInstance))
        {
            if(self::configDone())
            {
                self::$PDOInstance = new PDO(self::$dsn, self::$nom, self::$password);
            }
            else
            {
                throw new Exception(__CLASS__." : no config !");
            }
        }
        
        return self::$PDOInstance;
    }
    
//set de la configuration
    public static function setConfig($dsn, $nom, $password)
    {
        self::$dsn = $dsn;
        self::$nom = $nom;
        self::$password = $password;
    }


    private static function configDone()
    {
        return self::$dsn !== null && self::$prenom !== null && self::$nom && self::$role && self::$password !== null;
    }
}