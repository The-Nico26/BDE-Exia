<?php
	include_once ('item.php');
	include_once ('membre.php');
	
	class membreDAO extends item
	{
        public $table = null;

        function __construct($t)
        {
            self::$table = $t;
        }

        /*function find($champ, $condition)
        {
        	$resultatBDD = server::getRows("SELECT * FROM Membre WHERE ? = ?", array($champ, $condition) );
        	
        	$resultat = [];
        	
        	foreach ($resultatBDD as $ligne)
        	{
        		$nouveauMembre = new self(
        							$ligne["Prenom"],
        							$ligne["Nom"],
        							$ligne["Role"],
        							$ligne["Mail"],
        							$ligne["PassWord"]);
        						$nouveauMembre->id = $ligne["ID_Membre"];
        		array_push($resultat, $nouveauMembre);
        	}
        }*/
        
        
        function find(... $params)	
        {
			if(empty($params))
			{
				$param = null;
			}
			$resultat = [];
			$sql = "SELECT * FROM Membre"
			
			if($params != null)
			{
				$sql = "SELECT * FROM Membre WHERE ? = ?";
			}
			
			foreach(server::getRows($sql, $params) as $row)
			{
				$membre = membre::create($row['ID_Membre'], $row['Prenom'], $row['Nom'], $row['Mail'], $row['PassWord'], $row['Promotion'], $row['Token']);
				array_push($resultat, $membre);
			}
			
			return $resultat;
		}
		
		
    	 function remove($membre)
        {
        	if(empty($membre)) return;
        	server::actionRow('DELETE FROM Membre WHERE ID_Membre = ?', $membre->$id);
        }


        function update($membre)
        {
    		 if(empty($membre)) return;
    		 var_dump(ProduitDAO::find($membre->id));
    		 echo "<br>".$membre->id."<br>";
        
    		 if(count(membreDAO::find($membre->id)) != 0)
			{
    		  	server::actionRow("UPDATE Membre SET Prenom = ?, Nom = ?, Role = ?, Mail = ?, PassWord = ?, Promotion = ?, Token = ? WHERE ID_Membre = ?", $membre->prenom, $membre->nom, $membre->role, $membre->mail, $membre->passWord, $membre->promotion, $membre->token, $membre->id);
    		}
        	else
        	{
        		server::actionRow("INSERT INTO Membre VALUES ('', ?, ?, ?, ?, ?, ?, ?)", $membre->prenom, $membre->nom, $membre->role, $membre->mail, $membre->passWord, $membre->promotion, $membre->token);
        	}
        
        }
        
        
        
	}