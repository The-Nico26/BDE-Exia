<?php
	
	class membre
	{
		public $id;
		public $prenom;
		public $nom;
		public $role = "Etudiant";
		public $mail;
		public $passWord;
		public $promotion;
		public $token = 0;
		
		function create ($id, $prenom, $nom, $role, $mail, $passWord, $promotion)
		{
			$membre = new membre();
			
			$membre->$id = $id;
			$membre->$prenom = $prenom;
			$membre->$nom = $nom;
			$membre->$mail = $mail;
			$membre->$role = $role;
			$membre->$passWord = $passWord;
			$membre->$promotion = $promotion;

			
			return $membre;
		}
	}