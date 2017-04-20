<?php
	include_once ('item.php');
	include_once ('membre.php');
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	class membreDAO implements item
	{
        static function find(... $params)	
        {
			$resultat = [];
			$sql = "SELECT * FROM Membre";
			if(empty($params)){
				$params = null;
			}
			if($params != null)
			{
				$sql .= " WHERE ID_Membre = ?";
			}
			
			foreach(server::getRows($sql, $params) as $row)
			{
				$membre = membre::create($row['ID_Membre'], $row['Prenom'], $row['Nom'], $row['Role'], $row['Mail'], $row['Avatar'], $row['PassWord'], $row['Promotion'], $row['Token']);
				array_push($resultat, $membre);
			}
			
			return $resultat;
		}
		
		static function findToken($token){
			return membreDAO::find(server::getRows('SELECT * FROM Membre WHERE Token = ?', $token)[0]['ID_Membre'])[0];
		}

    	static function remove($membre)
        {
        	if(empty($membre)) return;
        	server::actionRow('DELETE FROM Membre WHERE ID_Membre = ?', $membre->$id);
        }


        static function update($membre)
        {
    		if(empty($membre)) return;
        
    		if(count(membreDAO::find($membre->id)) != 0)
			{
				$_SESSION['token'] = sha1($membre->prenom);
				if($membre->password != "")
    		  		server::actionRow("UPDATE Membre SET Prenom = ?, Nom = ?, Role = ?, Mail = ?, Avatar = ?, PassWord = ?, Promotion = ?, Token = ? WHERE ID_Membre = ?", $membre->prenom, $membre->nom, $membre->role, $membre->mail, $membre->avatar, md5(sha1(md5($membre->passWord))), $membre->promotion, sha1($membre->prenom), $membre->id);
    		  	else
    		  		server::actionRow("UPDATE Membre SET Prenom = ?, Nom = ?, Role = ?, Mail = ?, Avatar = ?, Promotion = ?, Token = ? WHERE ID_Membre = ?", $membre->prenom, $membre->nom, $membre->role, $membre->mail,$membre->avatar, $membre->promotion, sha1($membre->prenom), $membre->id);
    		}
        	else
        	{
        		server::actionRow("INSERT INTO Membre VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)", $membre->prenom, $membre->nom, $membre->role, $membre->mail, $membre->avatar, $membre->passWord, $membre->promotion, $membre->token);
        	}
        
        }
	}