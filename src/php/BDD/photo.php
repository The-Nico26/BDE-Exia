<?php
	
	class photo
	{
		public $id;
		public $url;
		
		static function create ($id, $url)
		{
			$photo = new photo();
			
			$photo->id = $id;
			$photo->url = $url;
			
			return $photo;
		}
	}