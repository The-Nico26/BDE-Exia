<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add"){
			if(isset($_POST['titre']) && isset($_POST['calendrier']) && isset($_POST['description']) && isset($_POST['id'] && isset($_POST['formulaire'])  && isset($_POST['lieu']){
				$titre = $_POST['titre'];
				$calendrier = $_POST['calendrier'];
				$description  = $_POST['description'];
				$id  = $_POST['id'];
				$lieu  = $_POST['lieu'];
				$formulaire  = $_POST['formulaire'];

				include_once '../BDD/produitDAO.php';
				$v = Produit::Create($id, $titre, $description , $formulaire , $calendrier);
				
				ProduitDAO::Update($v);
			}
		} else if($action == "remove") {
			if(isset($_POST['id'])){ 
				$id = $_POST['id'];
				include_once '../BDD/produitDAO.php';
				
				$v = Produit::Create($id, "", "", "", "", "");
				ProduitDAO::Remove($v);
			}
		}
	}
