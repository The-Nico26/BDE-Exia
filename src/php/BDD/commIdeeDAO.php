<?php
	
	include_once ('item.php');
	include_once ('commIdee.php');
	
	class commIdeeDAO implements item
	{
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM CommIdee";
        	
        	if($params != null){
        		$sql .= " WHERE ID_CommIdee = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$commIdee = commIdee::create($row['ID_CommIdee'], $row['Description'], $row['Temps'], $row['ID_Idee'], $row['ID_Membre']);
        		array_push($resultat, $commIdee);
        	}
        	
        	return $resultat;
        }
        
        
        static function remove($comm)
        {
            if(empty($comm)) return;
            
            server::actionRow("DELETE FROM CommIdee WHERE ID_CommIdee = ?", $comm->id);
        }
        
        static function findEvent($id){
            return server::getRows("SELECT * FROM CommIdee WHERE ID_Idee = ?", $id);
        }

        static function update($commIdee)
        {
        	if(empty($commIdee)) return;
        	
        	if(count(commIdeeDAO::find($commIdee->id)) != 0){
        		server::actionRow("UPDATE CommIdee SET Description = ? WHERE ID_CommIdee = ?", $commIdee->description, $commIdee->id);
        	} else {
        		server::actionRow("INSERT INTO CommIdee VALUES(null, ?, NOW(), ?, ?)", $commIdee->description, $commIdee->idEvent, $commIdee->idMembre);
        	}
        }
	}