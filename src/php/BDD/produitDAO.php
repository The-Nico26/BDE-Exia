<?php
	include_once ('item.php');
	include_once ('produit.php');
	
	class ProduitDAO implements item
	{
        static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Produit";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Produit = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$p = Produit::create($row['ID_Produit'], $row['Nom'], $row['Description'], $row['Prix'], $row['URL']);
        		array_push($resultat, $p);
        	}
        	
        	return $resultat;
        }

        static function remove($produit)
        {
        	if(empty($produit)) return;
        	
        	server::actionRow("DELETE FROM Produit WHERE ID_Produit = ?", $produit->id);
        }

        static function update($p)
        {
        	if(empty($p)) return;
        	var_dump(ProduitDAO::find($p->id));
        	echo "<br>".$p->id."<br>";
        	
        	if(count(ProduitDAO::find($p->id)) != 0){
        		server::actionRow("UPDATE Produit SET Nom = ?, Description = ?, Prix = ?, URL = ? WHERE ID_Produit = ?", $p->name, $p->description, $p->prix, $p->image, $p->id);
        	} else {
        		server::actionRow("INSERT INTO Produit VALUES('', ?, ?, ?, ?)", $p->name, $p->description, $p->prix, $p->image);
        	}
        }
	}