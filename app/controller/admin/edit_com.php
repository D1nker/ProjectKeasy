<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "login", USER_ADMIN);

$logements = selecttable("logement", array('orderby' => "logement_name",
                                                "order" => "ASC",
                                              "limite" => ":offset", ":limit"));
$users = selecttable("user", array('orderby' => "user_lastname",
                                                "order" => "ASC",
                                              "limite" => ":offset", ":limit"));


if (isset($_POST['title'])) {
    include ('app/model/admin/edit_com.php');

 $com_id = $_POST['id'];
 $resultat = edit_com($_POST, $com_id);

if(!$resultat) {

        location("admin", "index", "notif=nok");

    } 
    else {
        location("admin", "index", "&notif=ok");
    }
   
}

$options = array("wherecolumn" => "comment_id", "wherevalue" => $_GET['comId']);

$comms = selecttable('comment', $options);

foreach ($comms as $cle => $com) {
$comms[$cle]['comment_id'] =  $com['comment_id'];
  $comms[$cle]['comment_date'] =  $com['comment_date'];
  $comms[$cle]['comment_message'] =  $com['comment_message'];
  $comms[$cle]['comment_title'] =  $com['comment_title'];
  $comms[$cle]['comment_user_id'] =  $com['comment_user_id'];
  $comms[$cle]['comment_logement_id'] =  $com['comment_logement_id'];
}

define("BODY_CLASS", "bo_modify_comment");
define("PAGE_TITLE", "Modifier les commentaires");
include_once("app/view/admin/edit_com.php");