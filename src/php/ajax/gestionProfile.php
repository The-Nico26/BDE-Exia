<?php
ini_set('display_errors', 1);
if(isset($_POST['action'])){

    $action = $_POST['action'];
    if($action == "add" || $action == "edit"){
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['id'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            include_once '../BDD/profileDAO.php';
            $v = profile::Create($_POST['id'], $nom, $prenom , $mail);

            profileDAO::Update($v);
        }
    } else if($action == "remove") {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            include_once '../BDD/profileDAO.php';

            $v = Produit::Create($id, "", "", "", "", "");
            ProduitDAO::Remove($v);
        }
    }
}