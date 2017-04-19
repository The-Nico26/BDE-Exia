<?php
	include_once ('item.php');
	include_once ('idee.php');
	
	class ideeDAO extends item
	{
		function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Idee";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Idee = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$idee = idee::create($row['ID_Idee'], $row['Titre'], $row['Description'], $row['Pbleu'], $row['Prouge']);
        		array_push($resultat, $idee);
        	}
        	
        	return $resultat;
        }
        
        
        function remove($idee)
        {
        	if(empty($idee)) return;
        	
        	server::actionRow("DELETE FROM Idee WHERE ID_Idee = ?", $idee->$id);
        }
		
		
		function update($idee)
        {
        	if(empty($idee)) return;
        	var_dump(ideeDAO::find($idee->id));
        	echo "<br>".$idee->id."<br>";
        	
        	if(count(ideeDAO::find($idee->id)) != 0){
        		server::actionRow("UPDATE Idee SET Titre = ?, Description = ?, Pbleu = ?, Prouge = ?, Calendrier = ? WHERE ID_Idee = ?", $idee->titre, $idee->description, $idee->pbleu, $idee->prouge, $idee->calendrier, $idee->id);
        	} else {
        		server::actionRow("INSERT INTO Idee VALUES('', ?, ?, ?, ?, ?)", $idee->titre, $idee->description, $idee->pbleu, $idee->prouge, $idee->calendrier);
        	}
        }
	}