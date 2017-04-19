<?php
include_once 'singleton.php';
include_once 'config.php';


class membreModel implements model
{

    public $id = null;
    public $prenom = null;
    public $nom = null;
    public $mail = null;
    public $role = null;

    //constructeur
    public function __construct($prenom, $nom, $mail, $role)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->role = $role;
    }


    //afficher tout les membres
    public static function findAll()
    {
        $PDO = singleton::getInsance();
        $resulatBDD = $PDO->query("SELECT * FROM Memebre")->fetchAll();

        $resultat = [];
        foreach ($resulatBDD as $ligne)
        {
            $membre = new self(
                $ligne["Prenom"],
                $ligne["Nom"],
                $ligne["Mail"],
                $ligne["Role"]);
            $membre->id = $ligne["ID_membre"];

            array_push($resultat, $membre);
        }
        return $resultat;
    }

    //trouver un membre par l'ID
    public static function findOne($id)
    {
        $PDO = singleton::getInsance();
        $resultatBDD = $PDO->query("SELECT * FROM Membre WHERE id = $id")->fetch();

        $membre = new self(
            $resultatBDD["Prenom"],
            $resultatBDD["Nom"],
            $resultatBDD["Mail"],
            $resultatBDD["Role"]);
        $membre->id = $resultatBDD["ID_Membre"];

        return $membre;
    }

    //sauvegarder un membre
    public function save()
    {
        $PDO = singleton::getInsance();
        if($this->id > 0)
        {
            $resultatBDD = $PDO->query("UPDATE Membre SET 
                                                          Prenom = '$this->prenom'
                                                          Nom = '$this->nom'
                                                          Mail = '$this->mail'
                                                          Role = 'Etudiant')");
            return $resultatBDD > 0;
        }
        else
        {
            $resultatBDD = $PDO->query("INSERT INTO Membre (Prenom, Nom, Mail, Role) VALUES 
            												('$this->prenom',
            												'$this->nom',
            												'$this->mail',
            												'Etudiant')");
        }
    }

    //retirer un memebre
    public function remove()
    {
        $variable = $this->id;
        $PDO = singleton::getInsance();
        $resultatBDD = $PDO->query("DELETE FROM Membre WHERE id = $variable");
        return $resultatBDD > 0;
    }
}

?>