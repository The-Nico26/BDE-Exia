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
		}else if($action == "addComment"){
			if(isset($_POST['com'])){
				include_once '../BDD/commPhotoDAO.php';

				$id = $_POST['id'];
				$idM = $_POST['idM'];
				$com = $_POST['com'];

				$v = commPhoto::create("-1", $com, "", $id, $idM);
				commPhotoDAO::update($v);
			}
		} else if($action == "removeComment"){
			include_once '../BDD/commPhotoDAO.php';
			$v = commPhoto::create($_POST['id'], "", "", "", "");
			commPhotoDAO::remove($v);
		}
	}