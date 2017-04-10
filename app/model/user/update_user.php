<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function update_user($key)
    
    {
		global $pdo; 
		
		try {
            
            $req = "UPDATE  user		
					SET token=:token
                    WHERE token=:self";
		
			$query = $pdo->prepare($req);
            $query->bindValue(':token', '1', PDO::PARAM_INT);
            $query->bindValue(':self', $key, PDO::PARAM_STR);
			$query->execute();
		
			return true;
			
		}
		
	catch (Exception $e) {
    return false;

    }
}