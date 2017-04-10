<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function read_logement($id)
{
    global $pdo;

try {
    //On envoie la requête
    $query = $pdo->prepare("SELECT *
                    from logement, user, cat_logement, location_place
                          where logement_user_id = user_id
                            and cat_id = logement_cat_id
                            and location_place_id = place_id
                            and logement_id=:id");
          
             
   $query->bindParam(":id", $id, PDO::PARAM_INT);

    //On execute la requête
    $query->execute();
    //On récupere les résultats
    $detail = $query->fetch();
    //Supprimer le curseur
    $query->closeCursor();
    //On retourne le tableau articles qui contient un article
    return $detail;
}

catch (Exception $e) {
    erreur($e);
}
}

