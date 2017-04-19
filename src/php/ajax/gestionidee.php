<?php
	ini_set('display_errors', 1);
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add" || $action == "edit"){
			if(isset($_POST['title']) && isset($_POST['corpus'])){
				$title = $_POST['title'];
				$corpus = $_POST['corpus'];
				include_once '../BDD/ideeDAO.php';
				$v = Produit::Create($_POST['id'], $title, $corpus);
				
				ProduitDAO::Update($v);
			}
		} else if($action == "remove") {
			if(isset($_POST['id'])){ 
				$id = $_POST['id'];
				include_once '../BDD/ideeDAO.php';
				
				$v = Produit::Create($id, "", "");
				ProduitDAO::Remove($v);
			}
		}
	}