<?php

	include_once ('item.php');
	require ('photo.php');
	
	class photoDAO implements item
	{
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Photo";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Photo = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$photo = Photo::create($row['ID_Photo'], $row['URL'], $row['Titre'], $row['ID_Album']);
        		array_push($resultat, $photo);
        	}
        	
        	return $resultat;
        }
        
        
        static function remove($photo)
        {
        	if(empty($photo)) return;
        	
        	server::actionRow("DELETE FROM Photo WHERE ID_Photo = ?", $photo->id);
        }
        
        
        static function update($photo)
        {
        	if(empty($photo)) return;
        	echo $photo->idAlbum."ee<br>";

        	if(count(PhotoDAO::find($photo->id)) != 0){
        		server::actionRow("UPDATE Photo SET URL = ?, titre = ? WHERE ID_Produit = ?", $photo->url, $photo->nom, $photo->id);
        	} else {
        		server::actionRow("INSERT INTO Photo VALUES (null, ?, ?, ?)", $photo->url, $photo->nom, $photo->idAlbum);
        	}
        }
	}