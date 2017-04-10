<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
	function edit_com($comms, $com_id)


    {
		global $pdo;

		try {

            $req = "UPDATE comment
					SET comment_date= :cdate, comment_message= :message,  comment_title=:title, comment_user_id=:user, comment_logement_id=:logement
                    WHERE comment_id= :self";
			//on envoie la requête
			$query = $pdo->prepare($req);

			//On initialise les paramètres
            $query->bindValue(':self', $comms['id'], PDO::PARAM_STR);
            $query->bindValue(':cdate', $comms["cdate"], PDO::PARAM_STR);
            $query->bindValue(':message', $comms["message"], PDO::PARAM_STR);
            $query->bindValue(':title', $comms["title"], PDO::PARAM_STR);
            $query->bindValue(':user', $comms["user"], PDO::PARAM_STR);
            $query->bindValue(':logement', $comms["logement"], PDO::PARAM_STR);
            


			//On execute la requête
			$query->execute();
          

			return true;

		}

	catch (Exception $e) {
    return false;

    }
}
