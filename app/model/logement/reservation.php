
<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function ajouter_reservation($reservation, $userid, $logementid)  
    {
		global $pdo; 
		
		try {
            
            $req = "INSERT into reservation
							(reservation_date_arrive, reservation_date_return, reservation_user_id, reservation_logement_id, token_reservation)
						VALUES
							(:dateA, :dateR, :userid, :logementid, 1)";
			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
			$query->bindValue(':dateA', $reservation["dateA"], PDO::PARAM_STR);
            $query->bindValue(':dateR', $reservation["dateR"], PDO::PARAM_STR);
            $query->bindValue(':userid', $userid, PDO::PARAM_STR);
			$query->bindValue(':logementid', $logementid, PDO::PARAM_INT);
			


			//On execute la requête
			$query->execute();
			
	
		
			return true;
			
		}
		
	catch (Exception $e) {
	die($e->getMessage());
    return false;

    }
}