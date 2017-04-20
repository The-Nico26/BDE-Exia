<?php

	class idee
	{
		public $id;
		public $titre;
		public $description;
		public $pbleu;
		public $prouge;
		public $calendrier;
		
		
		static function create ($id, $titre, $description, $pbleu, $prouge, $calendrier)
		{
			$idee = new idee();
			
			$idee->id = $id;
			$idee->titre = $titre;
			$idee->description = $description;
			$idee->pbleu = $pbleu;
			$idee->prouge = $prouge;
			$idee->calendrier = $calendrier;
			
			return $idee;
		}
	}

?>