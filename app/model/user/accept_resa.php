<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function accept_resa($resa_id) {

		global $pdo; 
		
		try {
            
            $req = "UPDATE reservation		
					SET token_reservation= 2
                    WHERE reservation_id= :self";

			$query = $pdo->prepare($req);

            $query->bindValue(':self', $resa_id, PDO::PARAM_STR);

			$query->execute();
	
		
			return true;
			
		}
		
	catch (Exception $e) {
    return false;

    }
}


function edit_logement($logement_id) {

		global $pdo; 
		
		try {
            
            $req = "UPDATE logement		
					SET logement_dispo = 1
                    WHERE logement_id= :log";

			$query = $pdo->prepare($req);

            $query->bindValue(':log', $logement_id, PDO::PARAM_STR);

			$query->execute();
	
        
			return true;
			
		}
		
	catch (Exception $e) {
    return false;

    }
}

