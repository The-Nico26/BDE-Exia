<?php 
	class Produit {
		public $id;
		public $name;
		public $image;
		public $prix;
		public $description;
		
		static function create($id, $name, $description, $prix, $image){
			$p = new Produit();
			$p->id = $id;
			$p->name = $name;
			$p->image = $image;
			$p->prix = $prix;
			$p->description = $description;
			return $p;
		}
	}