<?php

	include_once ('item.php');
	require ('asso.php');

class assoDAO implements item
	{
		
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Asso";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Asso = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$asso = asso::create($row['ID_Asso'], $row['Titre'], $row['Description'], $row['President'], $row['Secretaire'],);

                array_push($resultat, $asso);
        	}
        	
        	return $resultat;
        }
        static function remove($asso)
        {
        	if(empty($asso)) return;
        	
        	server::actionRow("DELETE FROM Asso WHERE ID_Asso = ?", $asso->id);
        }
        
        
        static function update($asso)
        {
        	if(empty($asso)) return;
        	var_dump(assoDAO::find($asso->id));
        	
        	if(count(assoDAO::find($asso->id)) != 0){
        		server::actionRow("UPDATE Asso SET Titre = ?, Description = ?, President = ?, Secretaire = ? WHERE ID_Asso = ?", $asso->titre, $asso->description, $asso->President, $asso->Secretaire, $asso->id);
        	} else {
        		server::actionRow("INSERT INTO Asso VALUES(null, ?, ?, ?, ?, ?, ?)", $asso->titre, $asso->description, $asso->President, $asso->Secretaire, $asso->idAsso);
        	}
        }
	}
    }
?>