<?php
define("_BASE_URL", true);
include_once("../../app/config/config.inc.php");
include_once("../../app/model/pdo.inc.php");

 $repertoire = "webroot/photos/";
try {
    //On envoie la requête
    $query = $pdo->prepare('SELECT logement_id, logement_name, logement_price, cat_id, logement_category_type, place_name, 
                                        logement_details, logement_photo, logement_piece, logement_height
                                        FROM logement
                                        INNER JOIN cat_logement
                                        ON logement.cat_id = cat_logement.logement_cat_id
                                        INNER JOIN location_place
                                        ON logement.location_place_id = location_place.place_id 
                                        WHERE logement_cat_id= :type
                                        AND place_id= :place
                                        AND logement_details LIKE :clause');
                                        
  
    $clause = '%' . trim($_POST["saisie"]) . '%';

    $query->bindParam(':place', $_POST['place'], PDO::PARAM_INT);
    $query->bindParam(':type', $_POST['type'], PDO::PARAM_INT);
    $query->bindParam(':clause', $clause, PDO::PARAM_STR);
    $query->execute();
    $loge = $query->fetchAll();
    $query->closeCursor();
    //On retourne tous les lire_articles
    $return = "";
    foreach($loge as $log) { 
								
       $return.= " <div class='logement'>";
       $return .= "<img src='".$repertoire.$log['logement_photo']."'/>";
       $return .= "<div class='info_logement'>";
        $return .= "<span class='title'>".$log['logement_name']."</span>";
        $return .="<p>".$log['logement_details']."</p>";
        $return .="<p>".$log['logement_category_type'].", ".$log['place_name'].", ".$log['logement_height']."</p>";
        $return .="<span id='price'>".$log['logement_price']."/mois</span>";
        $return .= "</div>";
       $return .='<a href="?module=logement&action=detail&id='.$log['logement_id'].'"> <span id="plus">+</span> de détails</a>';
       $return .=" </div>";
       
    }
    if (empty($return)) {
    echo "<div class='logement'>Désolé aucun logement ne correspond à votre recherche</div>";
    }
    else {
        echo $return;
    }

}

catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}
