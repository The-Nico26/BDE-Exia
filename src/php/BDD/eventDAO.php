<?php
	
	include_once ('item.php');
	require ('event.php');
	
	class eventDAO implements item
	{
		
		static function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Event";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Event = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$event = event::create($row['ID_Event'], $row['Titre'], $row['Description'], $row['Formulaire'], $row['Calendrier'], $row['Lieu'], $row['ID_Album']);

                array_push($resultat, $event);
        	}
        	
        	return $resultat;
        }
        
        
        static function remove($event)
        {
        	if(empty($event)) return;
        	
        	server::actionRow("DELETE FROM Event WHERE ID_Event = ?", $event->$id);
        }
        
        
        static function update($event)
        {
        	if(empty($event)) return;
        	var_dump(EventDAO::find($event->id));
        	
        	if(count(EventDAO::find($event->id)) != 0){
        		server::actionRow("UPDATE Event SET Titre = ?, Description = ?, Formulaire = ?, Calendrier = ?, Lieu = ? WHERE ID_Event = ?", $event->titre, $event->description, $event->formulaire, $event->calendrier, $event->lieu, $event->id);
        	} else {
        		server::actionRow("INSERT INTO Event VALUES(null, ?, ?, ?, ?, ?, ?)", $event->titre, $event->description, $event->formulaire, $event->calendrier, $event->lieu, $event->idAlbums);
        	}
        }
	}