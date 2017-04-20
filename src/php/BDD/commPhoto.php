<?php

	class commPhoto
	{
		public $id;
		public $description;
		public $temps;
		public $idPhoto;
		public $idMembre;

		
		static function create($id, $description, $temps, $idPhoto, $idMembre)
		{
			$commPhoto = new commPhoto();
			
			$commPhoto->id = $id;
			$commPhoto->description = $description;
			$commPhoto->temps = $temps;
			$commPhoto->idPhoto = $idPhoto;
			$commPhoto->idMembre = $idMembre;

			return $commPhoto;
		}
	}