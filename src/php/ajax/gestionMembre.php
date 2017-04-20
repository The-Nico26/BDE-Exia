<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "edit"){
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$avatar = $_POST['avatar'];
			$mail = $_POST['mail'];
			$password = $_POST['password'];
			$role = $_POST['role'];
			$promotion = $_POST['promotion'];
			$token = $_POST['token'];
			$id = $_POST['id'];

			include_once '../BDD/membreDAO.php';
			$v = Membre::Create($id, $prenom, $nom, $role, $mail, $avatar, $password, $promotion, $token);
			
			MembreDAO::Update($v);
		}
	}