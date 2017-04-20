<?php
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		include_once '../BDD/ideeDAO.php';

		if($action == "add"){
			if(isset($_POST['title']) && isset($_POST['calendrier']) && isset($_POST['description'])){
				$title = $_POST['title'];
				$description = $_POST['description'];
				$calendrier = $_POST['calendrier'];
				$idM = $_POST['idM'];
				$id = $_POST['id'];

				$v = idee::Create($id, $title, $description, 0, 0, $calendrier, $idM);
				
				ideeDAO::Update($v);
			}
		} else if($action == "remove") {
			if(isset($_POST['id'])){ 
				$id = $_POST['id'];
				
				$v = idee::Create($id, "", "", "", "", "","");
				server::actionRow("DELETE FROM Action_Pouce WHERE ID_Idee = ?", $id);
				server::actionRow("DELETE FROM CommIdee WHERE ID_Idee = ?", $id);
				ideeDAO::Remove($v);
			}
		} else if($action == "bleu"){
			$idE = $_POST['id'];
			$idM = $_POST['idM'];

			if(empty(server::getRows("SELECT * FROM Action_Pouce WHERE ID_Membre = ? && ID_Idee = ?", $idM, $idE))){
				server::actionRow("INSERT INTO Action_Pouce VALUES (null, ?, ?)", $idM, $idE);
				server::actionRow("UPDATE Idee SET Pbleu = 1 + Pbleu WHERE ID_Idee = ?", $idE);
			}
		}else if($action == "rouge"){
			$idE = $_POST['id'];
			$idM = $_POST['idM'];

			if(empty(server::getRows("SELECT * FROM Action_Pouce WHERE ID_Membre = ? && ID_Idee = ?", $idM, $idE))){
				server::actionRow("INSERT INTO Action_Pouce VALUES (null, ?, ?)", $idM, $idE);
				server::actionRow("UPDATE Idee SET Prouge = 1 + Prouge WHERE ID_Idee = ?", $idE);
			}
		}else if($action == "addComment"){
			if(isset($_POST['com'])){
				include_once '../BDD/commIdeeDAO.php';

				$id = $_POST['id'];
				$idM = $_POST['idM'];
				$com = $_POST['com'];

				$v = commIdee::create("-1", $com, "", $id, $idM);
				commIdeeDAO::update($v);
			}
		} else if($action == "removeComment"){
			include_once '../BDD/commIdeeDAO.php';
			$v = commIdee::create($_POST['id'], "", "", "", "");
			commIdeeDAO::remove($v);
		}
	}