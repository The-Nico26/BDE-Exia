<?php

	class album
	{
		public $id;
		public $titre;
		public $description;
		
		function create($id, $titre, $description)
		{
			$album = new album();
			
			$album->id = $id;
			$album->titre = $titre;
			$album->description = $description;
			
			return $album;
		}
	}