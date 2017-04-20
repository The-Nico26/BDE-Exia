<?php

	include_once ('item.php');
	include_once ('panier.php');
	
	class panierDAO implements item
	{
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Panier";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Panier = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$panier = panier::create($row['ID_Panier'], $row['ID_Membre'], $row['ID_Produit']);
        		array_push($resultat, $panier);
        	}
        	
        	return $resultat;
        }
        
        static function findMembre($id){
            $resultat = [];

            foreach(server::getRows("SELECT * FROM Panier WHERE ID_Membre = ?", $id) as $row){
                $panier = panier::create($row['ID_Panier'], $row['ID_Membre'], $row['ID_Produit']);
                array_push($resultat, $panier);
            }
            
            return $resultat;
        }

        static function remove($panier)
        {
        	if(empty($panier)) return;
        	
        	server::actionRow("DELETE FROM Panier WHERE ID_Panier = ?", $panier->id);
        }
        
        
        static function update($panier)
        {
        	if(empty($panier)) return;
        	
        	if(count(PanierDAO::find($panier->id)) == 0){
        		server::actionRow("INSERT INTO Panier VALUES(null, ?, ?)", $panier->idMembre, $panier->idProduit);
        	}
        }
	}