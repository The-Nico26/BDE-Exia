<?php
	
	class photo
	{
		public $id;
		public $url;
		
		function create ($id, $url)
		{
			$photo = new photo();
			
			$photo->id = $id;
			$photo->url = $url;
			
			return $photo;
		}
	}