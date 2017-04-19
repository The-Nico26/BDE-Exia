<?php
	class permission
	{
		public $id;
		public $nom;
		
		function create($id, $nom)
		{
			$permission = new permission();
			
			$permission->id = $id;
			$permission->nom = $nom;
			
			return $permission;
		}
	}