<?php
	session_start();
	if(isset($_POST['action'])){
		$action = $_POST['action'];
		if($action == "inscription"){
			if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
				$nom = $_POST['name'];
				$password = md5(sha1(md5($_POST['password'])));
				$mail = $_POST['email'];
				$token = sha1($nom);
				preg_match('/^([a-z]*).([a-z]*)@.*/', $mail, $reg, PREG_OFFSET_CAPTURE);
				var_dump($reg);

				include_once '../BDD/membreDAO.php';
				$v = membre::Create("", $reg[1][0], $reg[2][0], "membre", $mail, "", $password, "?", $token);

				membreDAO::Update($v);
				$_SESSION['token'] = $token;
			}
		} else if($action == "connection") {
			if(isset($_POST['name']) && isset($_POST['password'])){ 
				$nom = $_POST['name'];
				$password = md5(sha1(md5($_POST['password'])));

				include_once '../BDD/membreDAO.php';
				$token = sha1($nom);

				$v = membreDAO::findToken($token);

				if(empty($v)) exit();
				$_SESSION['token'] = $v->token;
			}
		} else if($action == "logout"){
			session_destroy();
		}
	}