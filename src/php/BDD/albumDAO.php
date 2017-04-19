<?php

	include_once ('item.php');
	include_once ('album.php');
	
	
	class albumDAO extends item
	{
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Album";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Album = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$album = album::create($row['ID_Album'], $row['Titre'], $row['Description']);
        		array_push($resultat, $album);
        	}
        	
        	return $resultat;
        }
        
        
        static function remove($album)
        {
        	if(empty($album)) return;
        	
        	server::actionRow("DELETE FROM Album WHERE ID_Album = ?", $album->$id);
        }
        
        
        static function update($album)
        {
        	if(empty($album)) return;
        	var_dump(albumDAO::find($album->id));
        	echo "<br>".$album->id."<br>";
        	
        	if(count(albumDAO::find($album->id)) != 0){
        		server::actionRow("UPDATE Album SET Titre = ? WHERE ID_Album = ?", $album->titre, $album->description, $album->id);
        	} else {
        		server::actionRow("INSERT INTO Produit VALUES('', ?, ?)", $album->titre, $album->description);
        	}
        }
	}