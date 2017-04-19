<?php
	
	include_once ('item.php');
	include_once ('commIdee.php');
	
	class commIdeeDAO extends item
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
        		$commIdee = commIdeet::create($row['ID_CommIdee'], $row['Description'], $row['Temps']);
        		array_push($resultat, $commIdee);
        	}
        	
        	return $resultat;
        }
        
        
        static function update($commIdee)
        {
        	if(empty($commIdee)) return;
        	var_dump(ProduitDAO::find($commIdee->id));
        	echo "<br>".$commIdee->id."<br>";
        	
        	if(count(ProduitDAO::find($commIdee->id)) != 0){
        		server::actionRow("UPDATE CommIdee SET Description = ?, temps = ? WHERE ID_CommIdee = ?", $commIdee->description, $commIdee->temps, $p->id);
        	} else {
        		server::actionRow("INSERT INTO Produit VALUES('', ?, ?, ?, ?)", $commIdee->description, $commIdee->temps);
        	}
        }
	}