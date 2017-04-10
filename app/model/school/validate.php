<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function edit_users($user_id) {

		global $pdo; 
		
		try {
            
            $req = "UPDATE  user		
					SET school_token= 2
                    WHERE user_id= :self";

			$query = $pdo->prepare($req);

            $query->bindValue(':self', $user_id, PDO::PARAM_STR);

			$query->execute();
	
		
			return true;
			
		}
		
	catch (Exception $e) {
    return false;

    }
}