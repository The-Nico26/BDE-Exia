<?php
	
	class membre
	{
		public $id;
		public $prenom;
		public $nom;
		public $role;
		public $mail;
		public $passWord;
		
		function create ($id, $prenom, $nom, $role, $mail, $passWord)
		{
			$membre = new membre();
			
			$membre->$id = $id;
			$membre->$prenom = $prenom;
			$membre->$nom = $nom;
			$membre->$mail = $mail;
			$membre->$passWord = $password;
			$membre->$promotion = $promotion;
			$membre->$token = $token;
			
			return $membre;
		}
	}