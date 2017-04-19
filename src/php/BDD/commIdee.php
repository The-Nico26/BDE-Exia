<?php

	class commIdee
	{
		public $id;
		public $description;
		public $temps;
		
		function create ($id, $description, $temps)
		{
			$commIdee = new commIdee();
			
			$commIdee->id = $id;
			$commIdee->description = $description;
			$commIdee->temps = $temps;
			
			return $commIdee;
		}
		
		
		function remove($commIdee)
        {
        	if(empty($commIdee)) return;
        	
        	server::actionRow("DELETE FROM CommIdee WHERE ID_CommIde = ?", $commIdee->$id);
        }
        
        
        
	}