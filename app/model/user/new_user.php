
<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function inserer_users($users, $key)

    
    {

		global $pdo; 
		
		try {
            
            $req = "INSERT into user
							(user_lastname, user_firstname, user_mail, user_password, user_age, user_gender, user_phone_number, user_description, token, cat_user_id)
						VALUES
							(:login, :firstname, :email, :mdp, :age, :genre, :phone, :descri, :token, :catid )";
			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
			$query->bindParam(':login', $users["login"], PDO::PARAM_STR);
			$query->bindParam(':firstname', $users["firstname"], PDO::PARAM_STR);
			 $query->bindParam(':email', $users["email"], PDO::PARAM_STR);
            $query->bindParam(':mdp', $users["mdp"], PDO::PARAM_STR);
			$query->bindParam(':age', $users["age"], PDO::PARAM_STR);
			$query->bindParam(':genre', $users["genre"], PDO::PARAM_STR);
			$query->bindParam(':phone', $users["phone"], PDO::PARAM_STR);
			$query->bindParam(':descri', $users["descri"], PDO::PARAM_STR);
			$query->bindParam(':catid', $users["catid"], PDO::PARAM_STR);
			$query->bindParam(':token', $key, PDO::PARAM_STR);
		


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