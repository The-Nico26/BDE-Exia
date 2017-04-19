<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		if($action == "add"){
			if(isset($_POST['titre']) && isset($_POST['calendrier']) && isset($_POST['description']) && isset($_POST['id']) && isset($_POST['formulaire'])  && isset($_POST['lieu'])){
				$titre = $_POST['titre'];
				$calendrier = $_POST['calendrier'];
				$description  = $_POST['description'];
				$id  = $_POST['id'];
				$lieu  = $_POST['lieu'];
				$formulaire  = $_POST['formulaire'];

				include_once '../BDD/eventDAO.php';
				$v = event::Create($id, $titre, $description, $formulaire, $calendrier, $lieu, -1);
				if($id == "-1"){
					include_once '../BDD/albumDAO.php';
					$p = album::Create("", $titre, $description);
					albumDAO::Update($p);
					$v->idAlbum = server::getRows("SELECT * FROM Album ORDER BY ID_Album DESC LIMIT 1", null)[0]['ID_Album'];
					
				}
				eventDAO::Update($v);
			}
		} else if($action == "remove") {
			if(isset($_POST['id'])){ 
				$id = $_POST['id'];
				include_once '../BDD/eventDAO.php';
				include_once '../BDD/albumDAO.php';
				
				$v = eventDAO::Find($id)[0];
				$p = albumDAO::Find($v->idAlbums);
				albumDAO::Remove($p);
				eventDAO::Remove($v);
			}
		} else if($action == "inscription"){
			if(isset($_POST['idM']) && isset($_POST['idE'])){
				$idM = $_POST['idM'];
				$idE = $_POST['idE'];
				include_once '../BDD/eventDAO.php';
				
				server::actionRow("INSERT INTO participer VALUES ('$idM', '$idE')");
			}
		}
	}