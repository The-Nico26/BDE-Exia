<?php
ini_set('display_errors', 1);
if(isset($_POST['action'])){
    echo "test";
    $action = $_POST['action'];
    if($action == "add"){
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['passWord']) && isset($_POST['promotion']) && isset($_POST['id'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            $passWord = $_POST['passWord'];
            $promotion = $_POST['promotion'];
            include_once '../BDD/membreDAO.php';
            $v = membre::Create($_POST['id'], $nom, $prenom , $mail, $passWord, $promotion);

            membreDAO::Update($v);
        }
    } else if($action == "remove") {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            include_once '../BDD/membreDAO.php';

            $v = membre::Create($id, "", "", "", "", "");
            membreDAO::Remove($v);
        }
    }
}