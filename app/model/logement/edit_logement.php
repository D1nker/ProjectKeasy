<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
function edit_logement($logements, $photo, $logement_id)


{
    global $pdo;

    try {

      $req = "UPDATE logement
                        SET
                           logement_name= :name, logement_height= :height, logement_price= :price, logement_adress= :adress, logement_zip= :zip,
                           logement_details= :details, logement_rules= :rules, logement_piece= :piece, logement_info= :info,
                           logement_photo= :photo, cat_id= :cat, logement_user_id= :user, location_place_id=:place

                        WHERE logement_id = :self";

            //on envoie la requête
            $query = $pdo->prepare($req);

            //On initialise les paramètres
            $query->bindValue(':name', $logements["name"], PDO::PARAM_STR);
            $query->bindValue(':height', $logements["height"], PDO::PARAM_STR);
            $query->bindValue(':price', $logements["price"], PDO::PARAM_STR);
            $query->bindValue(':adress', $logements["adress"], PDO::PARAM_STR);
            $query->bindValue(':zip', $logements["zip"], PDO::PARAM_STR);
            $query->bindValue(':details', $logements["details"], PDO::PARAM_STR);
            $query->bindValue(':rules', $logements["rules"], PDO::PARAM_STR);
            $query->bindValue(':piece', $logements["piece"], PDO::PARAM_STR);
            $query->bindValue(':info', $logements["info"], PDO::PARAM_STR);
            $query->bindValue(':photo', $photo, PDO::PARAM_STR);
            $query->bindValue(':cat', $logements["cat_logement"], PDO::PARAM_STR);
            $query->bindValue(':user', $logements["user"], PDO::PARAM_STR);
            $query->bindValue(':place', $logements["location_place"], PDO::PARAM_STR);
            $query->bindValue(':self', $logement_id, PDO::PARAM_INT);

       // var_dump($logementss["l"]);
        //On execute la requête
        $query->execute();
        var_dump($query);


        return true;

    }

    catch (Exception $e) {
        return false;

    }
}
