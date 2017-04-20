<?php
		
	class panier
	{
		public $id;
		public $idMembre;
		public $idProduit;

		static function create($id, $idMembre, $idProduit)
		{
			$panier = new panier();
			
			$panier->id = $id;
			$panier->idMembre = $idMembre;
			$panier->idProduit = $idProduit;

			return $panier;
		}
	}