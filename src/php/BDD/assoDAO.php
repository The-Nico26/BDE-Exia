<?php
	include_once ('item.php');
	require 'asso.php';

    class assoDAO implements item
	{
		
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM association";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Association = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$asso = asso::create($row['ID_Association'], $row['Nom'], $row['Image'], $row['Description'], $row['ID_Membre']);
                array_push($resultat, $asso);
        	}
        	
        	return $resultat;
        }
        static function remove($asso)
        {
        	if(empty($asso)) return;
        	
        	server::actionRow("DELETE FROM association WHERE ID_Association = ?", $asso->id);
        }
        
        
        static function update($asso)
        {
        	if(empty($asso)) return;
        	
        	if(count(assoDAO::find($asso->id)) == 0){
        		server::actionRow("INSERT INTO association VALUES(null, ?, ?, ?, ?)", $asso->nom, $asso->image, $asso->description, $asso->idMembre);
        	}
        }
	}