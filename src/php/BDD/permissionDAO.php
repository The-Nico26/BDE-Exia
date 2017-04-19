<?php
	include_once ('item.php');
	include_once ('permission.php');
	
	class permissionDAO
	{
		function find(... $params)
        {
        	if(empty($params)){
        		$params = null;
        	}
        	
        	$resultat = [];
        	$sql = "SELECT * FROM Permission";
        	
        	if($params != null){
        		$sql .= " WHERE ID_Permission = ?";
        	}
        	foreach(server::getRows($sql, $params) as $row){
        		$permission = permission::create($row['ID_Permission'], $row['Nom']);
        		array_push($resultat, $permission);
        	}
     
        	return $resultat;
        }
        
        
        function remove($permission)
        {
        	if(empty($permission)) return;
        	
        	server::actionRow("DELETE FROM Permission WHERE ID_Permission = ?", $permission->$id);
        }
        
        
        function update($permission)
        {
        	if(empty($permission)) return;
        	var_dump(permissionDAO::find($permission->id));
        	echo "<br>".$permission->id."<br>";
        	
        	if(count(permissionDAO::find($permission->id)) != 0){
        		server::actionRow("UPDATE Permission SET Nom = ? WHERE ID_Permission = ?", $p->nom $p->id);
        	} else {
        		server::actionRow("INSERT INTO Permission VALUES('', ?)", $p->nom);
        	}
        }
	}