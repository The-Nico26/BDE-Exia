<?php
class server {
    private $pdo = null;
    private $requete = null;
    public static $server = null;

    private function __construct(){}

    public static function getInstance(){
        if(self::$server == null){
            self::$server = new server();

        }
        return self::$server;
    }

    private function connexion(){
        try {
            $server->$pdo = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'bde', 'cesi');
            $server->$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e){
            echo "mec sa ne marche pas";
        }
    }

    private function deconnexion(){
        $server->$pdo = null;
    }

    private function getRows($sql, ...$params){
        $server->connexion();

        $server->$requete = $server->$pdo->prepare($sql);
        if($params != null){
            $server->$requete->execute($params);
        }else {
            $server->$requete->execute();
        }
        $tab = $server->$requete->fetchAll();
        self::deconnexion();

        return $tab;
    }

    private function actionRow($sql, $param){
        self::connexion();

        $pdo->prepare($sql);
        if($param != null){
            $this->$pdo->execute($param);
        } else {
            $this->$pdo->exectute();
        }
        $this->$pdo->fetch();

        self::deconnexion();
    }

}