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
		public $token;
		public $avatar;

		static function create ($id, $prenom, $nom, $role, $mail, $avatar, $password, $promotion, $token)
		{
			$membre = new membre();
			
			$membre->id = $id;
			$membre->prenom = $prenom;
			$membre->role = $role;
			$membre->nom = $nom;
			$membre->mail = $mail;
			$membre->passWord = $password;
			$membre->promotion = $promotion;
			$membre->token = $token;
			$membre->promotion = $promotion;
			$membre->avatar = $avatar;
			return $membre;
		}
	}