<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "addPanier"){
			$idM = $_POST['idM'];
			$idP = $_POST['idP'];

			include_once '../BDD/panierDAO.php';

			$v = Panier::Create("-1", $idM, $idP);
			PanierDAO::Update($v);
		} else if ($action == "remove"){
			$id = $_POST['id'];
			include_once '../BDD/panierDAO.php';
			
			$v = Panier::Create($id, "", "");
			PanierDAO::Remove($v);
		}
	}