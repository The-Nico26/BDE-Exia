<?php

	include_once ('item.php');
	include_once ('panier.php');
	
	class panierDAO extends item
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
        		$panier = panier::create($row['ID_Panier']);
        		array_push($resultat, $panier);
        	}
        	
        	return $resultat;
        }
        
        
        static function remove($panier)
        {
        	if(empty($panier)) return;
        	
        	server::actionRow("DELETE FROM Panier WHERE ID_Panier = ?", $panier->$id);
        }
        
        
        /*static function update($panier)
        {
        	if(empty($panier)) return;
        	var_dump(ProduitDAO::find($panier->id));
        	echo "<br>".$panier->id."<br>";
        	
        	if(count(ProduitDAO::find($p->id)) != 0){
        		server::actionRow("UPDATE Produit SET Nom = ?, Description = ?, Prix = ?, URL = ? WHERE ID_Produit = ?", $p->name, $p->description, $p->prix, $p->image, $p->id);
        	} else {
        		server::actionRow("INSERT INTO Produit VALUES('', ?, ?, ?, ?)", $p->name, $p->description, $p->prix, $p->image);
        	}
        }*/
	}