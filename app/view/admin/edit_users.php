<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function edit_users($users, $user_id)

    
    {

		global $pdo; 
		
		try {
            
            $req = "UPDATE  blog_users		
					SET user_login= :logi, user_pass= :passwor, user_email=:mai, display_name= :pseud
                    WHERE ID= :self";
			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
            $query->bindValue(':self', $user_id, PDO::PARAM_STR);
			$query->bindValue(':logi', $users["login"], PDO::PARAM_STR);
            $query->bindValue(':passwor', $users["password"], PDO::PARAM_STR);
            $query->bindValue(':mai', $users["email"], PDO::PARAM_STR);
			$query->bindValue(':pseud', $users["pseudo"], PDO::PARAM_STR);

var_dump($users["login"]);
			//On execute la requête
			$query->execute();
			var_dump($query);
	
		
			return true;
			
		}
		
	catch (Exception $e) {
    return false;

    }
}