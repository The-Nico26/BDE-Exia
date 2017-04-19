<?php
	
	class event
	{
		public $id;
		public $titre;
		public $description;
		public $formulaire;
		public $calendrier;
		public $lieu;
		
		function create($id, $titre, $description, $formulaire, $calendrier, $lieu)
		{
			$event = new event();
		
			$event->id = $id;
			$event->titre = $titre;
			$event->description = $description;
			$event->formulaire = $formulaire;
			$event->calendrier = $calendrier;
			$event->lieu = $lieu;
			
			return $event;
		}
		
	}