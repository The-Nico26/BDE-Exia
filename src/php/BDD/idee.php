<?php

	class idee
	{
		public $id;
		public $titre;
		public $description;
		public $pbleu;
		public $prouge;
		public $calendrier;
		public $idMembre;
		
		static function create ($id, $titre, $description, $pbleu, $prouge, $calendrier, $idMembre)
		{
			$idee = new idee();
			
			$idee->id = $id;
			$idee->titre = $titre;
			$idee->description = $description;
			$idee->pbleu = $pbleu;
			$idee->prouge = $prouge;
			$idee->calendrier = $calendrier;
			$idee->idMembre = $idMembre;

			return $idee;
		}
	}