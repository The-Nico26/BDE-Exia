<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add"){
			if(isset($_POST['nom']) && isset($_POST['url']) && isset($_POST['prix']) && isset($_POST['description'])){
				$nom = $_POST['nom'];
				$url = $_POST['url'];
				$prix = $_POST['prix'];
				$description  = $_POST['description'];
				include_once '../BDD/produitDAO.php';
				$v = Produit::Create($_POST['id'], $nom, $description , $prix , $url);
				
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