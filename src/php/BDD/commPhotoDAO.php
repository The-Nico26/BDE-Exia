<?php
	
	include_once ('item.php');
	include_once ('commPhoto.php');
	
	class commPhotoDAO implements item
	{
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM CommPhoto";
        	
        	if($params != null){
        		$sql .= " WHERE ID_CommPhoto = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$commPhoto = commPhoto::create($row['ID_CommPhoto'], $row['Description'], $row['Temps'], $row['ID_Photo'], $row['ID_Membre']);
        		array_push($resultat, $commPhoto);
        	}
        	
        	return $resultat;
        }
        
        static function findPhoto($id){
            return server::getRows("SELECT * FROM CommPhoto WHERE ID_Photo = ?", $id);
        }
        static function remove($commPhoto)
        {
        	if(empty($commPhoto)) return;
        	
        	server::actionRow("DELETE FROM CommPhoto WHERE ID_CommPhoto = ?", $commPhoto->$id);
        }
        
        
        static function update($commPhoto)
        {
        	if(empty($commPhoto)) return;
        	
        	if(count(CommPhotoDAO::find($commPhoto->id)) == 0){
        		server::actionRow("INSERT INTO CommPhoto VALUES(null, ?, NOW(), ?, ?)", $commPhoto->description, $commPhoto->idPhoto, $commPhoto->idMembre);
        	}
        }
	}