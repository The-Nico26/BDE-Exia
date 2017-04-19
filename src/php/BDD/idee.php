<?php

	class idee
	{
		public $id;
		public $titre;
		public $description;
		public $pbleu;
		public $prouge;
		public $calendrier;
		
		
		function create ($id, $titre, $description, $pbleu, $prouge)
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