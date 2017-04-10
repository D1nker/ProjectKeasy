<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function edit_user($users, $photo, $user_id)
    
    {

		global $pdo; 
		
		try {
            
            $req = "UPDATE  user	
					SET user_lastname= :lastname, user_firstname= :firstname, user_mail= :mail, user_password= :password, user_nationality= :nationality, user_age= :age, user_gender= :gender, user_phone_number= :numero, user_description= :descr, user_photo= :photo
                    WHERE user_id= :self";

			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
            
			$query->bindParam(':lastname', $users["lastname"], PDO::PARAM_STR);
            $query->bindParam(':firstname', $users["firstname"], PDO::PARAM_STR);
            $query->bindParam(':mail', $users["mail"], PDO::PARAM_STR);
			$query->bindParam(':password', $users["password"], PDO::PARAM_STR);
			$query->bindParam(':nationality', $users["nationality"], PDO::PARAM_STR);
			$query->bindParam(':age', $users["age"], PDO::PARAM_STR);
			$query->bindParam(':gender', $users["gender"], PDO::PARAM_STR);
			$query->bindParam(':numero', $users["numero"], PDO::PARAM_STR);
			$query->bindParam(':descr', $users["descr"], PDO::PARAM_STR);
			$query->bindParam(':photo', $photo, PDO::PARAM_STR);
			$query->bindParam(':self', $user_id, PDO::PARAM_INT);


			//On execute la requête
			$query->execute();
			return true;
			
		}
		
	catch (Exception $e) {
    return false;

    }
}