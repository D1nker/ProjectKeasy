
<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function contact_us($message, $userid)  
    {
		global $pdo; 
		
		try {
            
            $req = "INSERT into contact_us
							(contact_title, contact_date, contact_message, user_id)
						VALUES
							(:title, :dateC, :message, :userid)";
			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
            $query->bindValue(':title', $message["title"], PDO::PARAM_STR);
			$query->bindValue(':dateC', $message["dateC"], PDO::PARAM_STR);
            $query->bindValue(':message', $message["message"], PDO::PARAM_STR);
            $query->bindValue(':userid', $userid, PDO::PARAM_STR);
			
			


			//On execute la requête
			$query->execute();
			
	
		
			return true;
			
		}
		
	catch (Exception $e) {
	die($e->getMessage());
    return false;

    }
}