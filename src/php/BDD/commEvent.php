<?php
	
	class commEvent
	{
		public $id;
		public $description;
		public $temps;
		
		static function create($id, $description, $temps)
		{
			$commEvent = new commEvent();
			
			$commEvent->id = $id;
			$commEvent->description = $description;
			$commEvent->temps = $temps;
			
			return $commEvent;
		}
	}