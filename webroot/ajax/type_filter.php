<?php 
define("_BASE_URL", true);
include_once("../../app/config/config.inc.php");
include_once("../../app/model/pdo.inc.php");


try {
    //On envoie la requête
    $query = $pdo->prepare('SELECT distinct(logement_cat_id), logement_category_type 
                            FROM location_place, cat_logement, logement 
                            WHERE logement_cat_id = cat_id 
                            AND place_id = location_place_id 
                            AND place_id=:place');
                      

    $query->bindParam(':place', $_GET["place"], PDO::PARAM_INT);
    $query->execute();
    $categories = $query->fetchAll();
    $query->closeCursor();
   

	foreach($categories as $category) { 
								
			echo "<option value='" . $category["logement_cat_id"] . "'";
            echo ">";
            echo $category["logement_category_type"];
            echo "</option>";
    }
    

}

catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}

