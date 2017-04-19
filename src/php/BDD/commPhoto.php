<?php

	class commPhoto
	{
		public $id;
		public $description;
		public $temps;
		
		
		function create($id, $description, $temps)
		{
			$commPhoto = new comPhoto();
			
			$commPhoto->id = $id;
			$commPhoto->description = $description;
			$commPhoto->temps= $temps;
			
			return $commPhoto;
		}
	}