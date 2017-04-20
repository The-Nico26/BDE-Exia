<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add"){
			if(isset($_POST['nom']) && isset($_POST['url'])){
				$nom = $_POST['nom'];
				$url = $_POST['url'];
				include_once '../BDD/photoDAO.php';
				$v = photo::Create($_POST['id'], $url, $nom, $_POST['idAlbum']);
				photoDAO::Update($v);
			}
		} else if($action == "remove") {
			if(isset($_POST['id'])){ 
				$id = $_POST['id'];
				include_once '../BDD/photoDAO.php';
				
				$v = photo::Create($id, "", "", "");
				photoDAO::Remove($v);
			}
		}
	}