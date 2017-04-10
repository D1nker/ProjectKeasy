<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function lire_resa($offset, $limite, $user)
{
    global $pdo;

try {

    $query = $pdo->prepare('SELECT logement_id, logement_name, logement_price, reservation_date_arrive, reservation_date_return,
                                   logement_user_id, user_id, user_firstname, cat_id, location_place_id, user_lastname, logement_cat_id, 
                                   logement_category_type, place_id, place_name, logement_photo, token_reservation
                                        FROM reservation
                                        INNER JOIN logement
                                        ON reservation.reservation_logement_id = logement.logement_id
                                        INNER JOIN user 
                                        ON logement.logement_user_id = user.user_id
                                        INNER JOIN cat_logement
                                        ON logement.cat_id = cat_logement.logement_cat_id
                                        INNER JOIN location_place
                                        ON logement.location_place_id = location_place.place_id
                                        WHERE reservation_user_id = :self
                                        LIMIT :offset, :limite');
                      

    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->bindParam(':limite', $limite, PDO::PARAM_INT);
    $query->bindParam(':self', $user, PDO::PARAM_INT);
   

    $query->execute();

    $resas = $query->fetchAll();
  
    $query->closeCursor();

    return $resas;

    

}

 catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
 }
}