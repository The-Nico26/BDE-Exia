<?php
	
	include_once ('item.php');
	include_once ('commPhoto.php');
	
	class commPhotoDAO extends item
	{
		function find(... $params)
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
        		$commPhoto = commPhoto::create($row['ID_CommPhoto'], $row['Description'], $row['Temps']);
        		array_push($resultat, $commPhoto);
        	}
        	
        	return $resultat;
        }
        
        
        function remove($commPhoto)
        {
        	if(empty($commPhoto)) return;
        	
        	server::actionRow("DELETE FROM CommPhoto WHERE ID_CommPhoto = ?", $commPhoto->$id);
        }
        
        
        function update($commPhoto)
        {
        	if(empty($commPhoto)) return;
        	var_dump(commPhotoDAO::find($commPhoto->id));
        	echo "<br>".$commPhoto->id."<br>";
        	
        	if(count(commPhotoDAO::find($commPhoto->id)) != 0){
        		server::actionRow("UPDATE CommPhoto SET Description = ?, Temps = ? WHERE ID_CommPhoto = ?", $commPhoto->description, $commPhoto->temps, $commPhoto->id);
        	} else {
        		server::actionRow("INSERT INTO CommPhoto VALUES('', ?, ?, ?, ?)", $commPhoto->description, $commPhoto->temps);
        	}
        }
	}