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
        		$photo = Photo::create($row['ID_Photo'], $row['URL']);
        		array_push($resultat, $photo);
        	}
        	
        	return $resultat;
        }
        
        
        static function remove($photo)
        {
        	if(empty($photo)) return;
        	
        	server::actionRow("DELETE FROM Photo WHERE ID_Photo = ?", $photo->$id);
        }
        
        
        static function update($photo)
        {
        	if(empty($photo)) return;
        	var_dump(ProduitDAO::find($photo->id));
        	echo "<br>".$photo->id."<br>";
        	
        	if(count(ProduitDAO::find($photo->id)) != 0){
        		server::actionRow("UPDATE Photo SET URL = ? WHERE ID_Produit = ?", $photo->url, $photo->id);
        	} else {
        		server::actionRow("INSERT INTO Produit VALUES('', ?)", $photo->url);
        	}
        }
	}