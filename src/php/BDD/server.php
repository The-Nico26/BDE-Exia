<?php
    class server {
    	public static $pdo = null;
    	
    	function connexion(){
    		try {
				self::$pdo = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'bde', 'cesi');
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (Exception $e){
				echo "mec sa ne marche pas";
			}
    	}
    	
    	function deconnexion(){
    		self::$pdo = null;
    	}
    	
    	public static function getRows($sql, ...$params){
    		self::connexion();
        		
        		if(is_array($params[0])){
        			$params = $params[0];
        		}
        		
	    		$t = self::$pdo->prepare($sql);
	    		if($params != null){
	    			$t->execute($params);
	    		}else {
	    			$t->execute();
	    		}
	  			$tab = $t->fetchAll();
    		self::deconnexion();
    		
    		return $tab;
    	}
    	
    	public static function actionRow($sql, ...$params){
    		self::connexion();
        		
        		
	    		$t = self::$pdo->prepare($sql);
	    		if($params != null){
	    			$t->execute($params);
	    		} else {
	    			$t->execute();
	    		}
	    		
    		self::deconnexion();
    	}
    }