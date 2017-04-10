<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function read_photos($id)
{
    global $pdo;

try {
    //On envoie la requête
    $query = $pdo->prepare("SELECT photos_logement_id, photo, logement_id, photos_ordre
                    FROM photos
                    INNER JOIN logement
                    ON logement.logement_id = photos.photos_logement_id
                    WHERE photos_logement_id = :id");
          
             $query->bindParam(':id', $id, PDO::PARAM_INT);


    //On execute la requête
    $query->execute();
    //On récupere les résultats
    $photos = $query->fetchAll();
    //Supprimer le curseur
    $query->closeCursor();
    //On retourne le tableau articles qui contient un article
    return $photos;
}

catch (Exception $e) {
    erreur($e);
}
}

