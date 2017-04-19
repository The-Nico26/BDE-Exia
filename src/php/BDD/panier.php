<?php
		
	class panier
	{
		public $id;
		
		function create($id)
		{
			$panier = new panier();
			
			$panier->id = $id;
			
			return $panier;
		}
	}