<?php
define("_BASE_URL", true);
include_once("../../app/config/config.inc.php");
include_once("../../app/model/pdo.inc.php");

$repertoire = "webroot/photos/";
try {
   //On envoie la requête
   $query = $pdo->prepare('SELECT logement_id, logement_name, logement_price, cat_id, logement_category_type, user_lastname, user_firstname,
                                       logement_details, logement_photo, logement_adress
                                       FROM logement
                                       INNER JOIN cat_logement
                                       ON logement.cat_id = cat_logement.logement_cat_id
                                       INNER JOIN location_place
                                       ON logement.location_place_id = location_place.place_id
                                       INNER JOIN user
                                       ON user.user_id = logement_user_id
                                       WHERE place_id= :place');





   $query->bindParam(':place', $_POST['place'], PDO::PARAM_INT);
   $query->execute();
   $loge = $query->fetchAll();
   $query->closeCursor();
   //On retourne tous les lire_articles
   $return = "";
   foreach($loge as $log) {
      $return .='<tr class="logement">';
      $return .= "<td><img src='".$repertoire.$log['logement_photo']."'/></td>";
      $return .= '<td>'.$log["user_lastname"]." ".$log["user_firstname"].'</td>';
      $return .= '<td>'.$log["logement_name"]."</td>";
      $return .= "<td id='price'>".$log['logement_price']."/mois</td>";
      $return .="<td>".$log['logement_adress']."</td>";
      $return .= "<td>".$log['logement_category_type']."</td>";
      $return .='<td><a href="?module=admin&action=modify&logementId='.$log['logement_id'].'"> <span id="plus">+</span> de détails</a></td>';
      $return .='<td><a href="?module=admin&action=modify&id='.$log['logement_id'].'"> <span id="plus">+</span> Modifier</a></td>';
      $return .='<td>';
      $return .= "<a href='?module=admin&action=delete_logement&id=";
      $return .= $log['logement_id']."'>Supprimer</a>";
      $return .= '</td>';
      $return .='</tr>';

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
