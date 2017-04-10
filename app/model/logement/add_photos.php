<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");


	function add_photos($ordre, $logement, $photo) {
		global $pdo; 
		
		try {
            
            $req = "INSERT INTO photos
					 SET
		   				photos_ordre = (:ordre),
           				photos_logement_id =  (SELECT logement_id FROM logement WHERE logement_id = :self), 
          				 photo=  (:photo)";
							
			//on envoie la requête
			$query = $pdo->prepare($req);
			
			//On initialise les paramètres
			$query->bindParam(':ordre', $ordre, PDO::PARAM_STR);
            $query->bindParam(':self', $logement, PDO::PARAM_INT);
			$query->bindParam(':photo', $photo, PDO::PARAM_STR);


			//On execute la requête
			$query->execute();
			
	
		
			return true;
			
		}
	
	catch (Exception $e) {
	die($e->getMessage());
    return false;

    }
}