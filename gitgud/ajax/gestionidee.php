<?php
	ini_set('display_errors', 1);
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add" || $action == "edit"){
			if(isset($_POST['title']) && isset($_POST['descritpion'])){
				$title = $_POST['title'];
				$descritpion = $_POST['descritpion'];
				include_once '../BDD/ideeDAO.php';
				$v = idee::Create($_POST['id'], $title, $descritpion);
				
				ideeDAO::Update($v);
			}
		} else if($action == "remove") {
			if(isset($_POST['id'])){ 
				$id = $_POST['id'];
				include_once '../BDD/ideeDAO.php';
				
				$v = idee::Create($id, "", "", "", "0", "0");
				ideeDAO::Remove($v);
			}
		}
	}