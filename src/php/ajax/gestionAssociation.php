<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add"){
			$image = $_POST['image'];
			$description = $_POST['description'];
			$id = $_POST['id'];
			$titre = $_POST['titre'];
			$idM = $_POST['idM'];

			include_once '../BDD/assoDAO.php';

			$v = asso::Create($id, $titre, $image, $description, $idM);
			assoDAO::Update($v);
		} else if ($action == "remove"){
			$id = $_POST['id'];
			include_once '../BDD/assoDAO.php';
			
			$v = asso::Create($id, "", "", "", "");
			assoDAO::Remove($v);
		}
	}