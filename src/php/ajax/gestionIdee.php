<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add"){
			if(isset($_POST['title']) && isset($_POST['calendrier']) && isset($_POST['description'])){
				$title = $_POST['title'];
				$description = $_POST['description'];
				$calendrier = $_POST['calendrier'];
				$idM = $_POST['idM'];
				$id = $_POST['id'];

				include_once '../BDD/ideeDAO.php';
				$v = idee::Create($id, $title, $description, 0, 0, $calendrier, $idM);
				
				ideeDAO::Update($v);
			}
		} else if($action == "remove") {
			if(isset($_POST['id'])){ 
				$id = $_POST['id'];
				include_once '../BDD/ideeDAO.php';
				
				$v = idee::Create($id, "", "", "", "", "","");
				ideeDAO::Remove($v);
			}
		}
	}