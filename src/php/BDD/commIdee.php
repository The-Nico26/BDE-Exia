<?php

	class commIdee
	{
		public $id;
		public $description;
		public $temps;
		public $idEvent;
		public $idMembre;

		static function create ($id, $description, $temps, $idEvent, $idMembre)
		{
			$commIdee = new commIdee();
			
			$commIdee->id = $id;
			$commIdee->description = $description;
			$commIdee->temps = $temps;
			$commIdee->idEvent = $idEvent;
			$commIdee->idMembre = $idMembre;
			
			return $commIdee;
		}
        
	}