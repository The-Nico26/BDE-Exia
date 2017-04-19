<?php
	include_once ("singleton.php");
	include_once ("config.php");
	
	
	class eventModel implements model
	{
		public $id = null;
		public $titre = null;
		public $description = null;
		public $formulaire = null;
		public $calendrier = null;
		public $lieu = null;
		
		
		public function __contstruct($titre, $description, $formulaire, $calendrier, $lieu)
		{
			$this->titre = $titre;
			$this->description = $description;
			$this->formulaire = $formulaire;
			$this->calendrier = $calendrier;
			$this->lieu = $lieu;
		}
		
	}