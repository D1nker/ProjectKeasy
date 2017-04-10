<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function lire_doc($id)

    
    {

		global $pdo; 
		
		try {
		
			//on envoie la requête
			$query = $pdo->prepare('SELECT user_certificate_school, user_id
                                    FROM user
								    WHERE user_id=:id ');
			
			//On initialise les paramètres
			$query->bindParam(':id', $id, PDO::PARAM_INT);

			//On execute la requête
			$query->execute();

			//On recupère tous les résultats
			$name = $query->fetchAll();

			//On ferme le curseur
			$query->closeCursor();
			
			//On retourne tous les articles selectionnés
			return $name;
			
		}
		
	catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}

	}