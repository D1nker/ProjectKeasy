<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function lire_logement($user)
{
    global $pdo;

try {

    $query = $pdo->prepare('SELECT logement_id, logement_name, logement_price, 
                                   logement_user_id, user_id,  cat_id, location_place_id, 
                                   logement_cat_id, logement_photo,
                                   logement_category_type, place_id, place_name
                                        FROM logement
                                        INNER JOIN user 
                                        ON logement.logement_user_id = user.user_id
                                        INNER JOIN cat_logement
                                        ON logement.cat_id = cat_logement.logement_cat_id
                                        INNER JOIN location_place
                                        ON logement.location_place_id = location_place.place_id   
                                        WHERE user_id = :self');

    $query->bindParam(':self', $user, PDO::PARAM_INT);
   

    $query->execute();
  
    $logements = $query->fetchAll();
  
    $query->closeCursor();

    return $logements;

    

}

 catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
 }
}