<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function lire_logements($offset, $limite, $pays, $type)
{
    global $pdo;

try {
    //On envoie la requête
    $query = $pdo->prepare('SELECT logement_id, logement_name, logement_price, cat_id, logement_category_type, place_name, logement_photo,
                                        left(logement_details,298) as contenu
                                        FROM logement
                                        INNER JOIN cat_logement
                                        ON logement.cat_id = cat_logement.logement_cat_id
                                        INNER JOIN location_place
                                        ON logement.location_place_id = location_place.place_id 
                                        WHERE logement_cat_id= :type
                                        AND place_id= :pays
                                        LIMIT :offset, :limite');
                      

    // On initialise les paramètres
    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->bindParam(':limite', $limite, PDO::PARAM_INT);
    $query->bindParam(':pays', $pays, PDO::PARAM_INT);
    $query->bindParam(':type', $type, PDO::PARAM_INT);
    




    //On execute la requête
    $query->execute();
    //On récupere les résultats
    $logements = $query->fetchAll();
    //Supprimer le curseur
    $query->closeCursor();
    //On retourne tous les lire_articles
    return $logements;
    

}

catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}
}