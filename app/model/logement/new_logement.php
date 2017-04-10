
<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function new_logement($logement, $photo, $user_id)

    {
		global $pdo; 
		
		try {
            
            $req = "INSERT into logement
							(logement_name, cat_id, location_place_id, logement_height, logement_price, logement_adress, logement_zip, logement_details, logement_rules, logement_piece, logement_photo, logement_info, logement_user_id, logement_dispo)
						VALUES
							(:name, :cat, :place, :height, :price, :adress, :zip, :details, :rules, :piece, :photo, :info, :self, 0)";
			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
			$query->bindParam(':name', $logement["name"], PDO::PARAM_STR);
			$query->bindParam(':cat', $logement["cat"], PDO::PARAM_STR);
            $query->bindParam(':place', $logement["place"], PDO::PARAM_INT);
			$query->bindParam(':height', $logement["height"], PDO::PARAM_STR);
            $query->bindParam(':price', $logement["price"], PDO::PARAM_STR);
			$query->bindParam(':adress', $logement["adress"], PDO::PARAM_STR);
            $query->bindParam(':zip', $logement["zip"], PDO::PARAM_STR);
            $query->bindParam(':details', $logement["details"], PDO::PARAM_STR);
			$query->bindParam(':rules', $logement["rules"], PDO::PARAM_STR);
			$query->bindParam(':piece', $logement["piece"], PDO::PARAM_STR);
            $query->bindParam(':photo', $photo, PDO::PARAM_STR);
			$query->bindParam(':info', $logement["info"], PDO::PARAM_STR);
			$query->bindParam(':self', $user_id, PDO::PARAM_INT);
		


			//On execute la requête
			$query->execute();
			return $pdo->lastInsertId();
		}
	
	catch (Exception $e) {
	die($e->getMessage());
    return false;

    }
}