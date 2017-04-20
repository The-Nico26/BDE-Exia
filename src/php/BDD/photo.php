<?php
	
	class photo
	{
		public $id;
		public $url;
		public $nom;
		public $idAlbum;

		static function create ($id, $url, $nom, $idAlbum)
		{
			$photo = new photo();
			
			$photo->id = $id;
			$photo->url = $url;
			$photo->nom = $nom;
			$photo->idAlbum = $idAlbum;

			return $photo;
		}
	}