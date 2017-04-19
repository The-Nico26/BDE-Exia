<?php

	include_once ('item.php');
	include_once ('album.php');
	
	
	class albumDAO extends item
	{
		function find(... $params)
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
        
        
         function remove($album)
        {
        	if(empty($album)) return;
        	
        	server::actionRow("DELETE FROM Album WHERE ID_Album = ?", $album->$id);
        }
        
        
         function update($album)
        {
        	if(empty($album)) return;
        	var_dump(ProduitDAO::find($album->id));
        	echo "<br>".$p->id."<br>";
        	
        	if(count(ProduitDAO::find($album->id)) != 0){
        		server::actionRow("UPDATE Album SET Titre = ? WHERE ID_Album = ?", $album->titre, $album->description, $album->id);
        	} else {
        		server::actionRow("INSERT INTO Produit VALUES('', ?, ?)", $album->titre, $album->description);
        	}
        }
	}