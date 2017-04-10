<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function lire_nb_logements()
{
    global $pdo;

try {
    //On envoie la requête
    $query = $pdo->prepare('SELECT COUNT(logement_id)
                                        as nb_logements
                                        FROM logement
                                        ORDER BY logement_name DESC');
                                        

    
    //On execute la requête
    $query->execute();
    //On récupere les résultats
    $nb_logements = $query->fetch();
    //Supprimer le curseur
    $query->closeCursor();
    //On retourne tous les lire_articles
    return $nb_logements['nb_logements'];
}

catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}
}