<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function lire_comm()


    {

		global $pdo;

		try {

			//on envoie la requête
			$query = $pdo->prepare('SELECT user_id, user_lastname, user_firstname, comment_logement_id, comment_user_id, comment_date, comment_title, comment_message
                                    FROM user, comment
									WHERE user_id=comment_user_id
									AND comment_logement_id=:id
									ORDER BY comment_date DESC');

			//On initialise les paramètres		
			$query->bindParam(':id', $id, PDO::PARAM_INT);

			//On execute la requête
			$query->execute();

			//On recupère tous les résultats
			$comment = $query->fetchAll();

			//On ferme le curseur
			$query->closeCursor();

			//On retourne tous les articles selectionnés
			return $comment;

		}

	catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}

	}
