<?php
define("_BASE_URL", true);
include_once("../../app/config/config.inc.php");
include_once("../../app/model/pdo.inc.php");


try {
   //On envoie la requête
   $query = $pdo->prepare('SELECT *
                                       FROM comment
                                       INNER JOIN logement
                                       ON logement.logement_id = comment.comment_logement_id
                                       INNER JOIN user
                                       ON user.user_id = comment.comment_user_id
                                       WHERE user_id= :self');





   $query->bindParam(':self', $_POST['user'], PDO::PARAM_INT);
   $query->execute();
   $comms = $query->fetchAll();
   $query->closeCursor();
   //On retourne tous les lire_articles
   $return = "";
   foreach($comms as $com) {
      $return .='<tr class="comms">';
      $return .= "<td>".$com['comment_title']."</td>";
      $return .= "<td>".$com['comment_message']."</td>";
      $return .= "<td>".$com['comment_date']."</td>";
      $return .= "<td>".$com['logement_name']."</td>";
      $return .='<td>';
      $return .= "<a href='?module=admin&action=edit_com&comId=";
      $return .= $com['comment_id']."'> Modifier</a>";
      $return .= '</td>';
      $return .='<td>';
      $return .= "<a href='?module=admin&action=delete_commentaire&id=";
      $return .= $com['comment_id']."'> Supprimer</a>";
      $return .= '</td>';
      $return .='</tr>';

   }
   if (empty($return)) {
   echo "<div class='comms'>Désolé aucun commentaire n'a pu être associer à ce compte</div>";
   }
   else {
  echo $return;
   }

}

catch (Exception $e) {
   die('Erreur SQL : ' . $e->getMessage());
}
