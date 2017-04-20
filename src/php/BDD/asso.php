<?php
	class asso
		{
			public $id;
			public $nom;
			public $image;
			public $description;
			public $idMembre;

			static function create($id, $titre, $image, $description, $idMembre)
			{
				$asso = new asso();
				
				$asso->id = $id;
				$asso->nom = $titre;
				$asso->description = $description;
				$asso->image = $image;
				$asso->idMembre = $idMembre;

				return $asso;
			}
		}