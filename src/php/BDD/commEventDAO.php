<?php

	include_once ('item.php');
	include_once ('commEvent');
	
	class commEventDAO extends item
	{
		 static function find(... $params)
                {
                	if(empty($params)){
                		$params = null;
                	}
                	
                	$resultat = [];
                	$sql = "SELECT * FROM CommEvent";
                	
                	if($params != null){
                		$sql .= " WHERE ID_CommEvent = ?";
                	}
                	foreach(server::getRows($sql, $params) as $row){
                		$commEvent = commEvent::create($row['ID_CommEvent'], $row['Description'], $row['Temps']);
                		array_push($resultat, $commEvent);
                	}
                	
                	return $resultat;
                }
		
		
		static function remove($commEvent)
                {
                	if(empty($commEvent)) return;
                	
                	server::actionRow("DELETE FROM CommEvent WHERE ID_CommEvent = ?", $commEvent->$id);
                }
        
        
        static function update($$commEvent)
        {
        	if(empty($commEvent)) return;
        	var_dump(ProduitDAO::find($commEvent->id));
        	echo "<br>".$commEvent->id."<br>";
        	
        	if(count(ProduitDAO::find($commEvent->id)) != 0){
        		server::actionRow("UPDATE CommEvent SET Description = ?, Temps = ? WHERE ID_commEvent = ?", $commEvent->description, $commEvent->temps, $commEvent->id);
        	} else {
        		server::actionRow("INSERT INTO Produit VALUES('', ?, ?)", $p->description, $p->temps);
        	}
        }
}