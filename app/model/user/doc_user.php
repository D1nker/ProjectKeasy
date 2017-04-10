<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function inserer_doc($certif, $user)

    {

		global $pdo; 
		
		try {
            
            $req = "UPDATE user
						SET user_certificate_school= :certif	
                        WHERE user_id = :user ";
			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
			$query->bindParam(':certif', $certif, PDO::PARAM_STR);
			$query->bindParam(':user', $user, PDO::PARAM_INT);
		


			//On execute la requête
			$query->execute();
			var_dump($req);
	
		
			return true;
			
		}
	
	catch (Exception $e) {
	die($e->getMessage());
    return false;

    }
}